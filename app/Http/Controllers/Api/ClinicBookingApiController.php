<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\ClinicHoliday;
use App\Models\ClinicSchedule;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ClinicBookingApiController extends Controller
{
    protected int $bufferHours = 24; // Buffer time: Bắt buộc đặt trước 24 tiếng
    protected string $clinicTz = 'Asia/Ho_Chi_Minh'; // Luôn cố định giờ VN

    /**
     * API 1: Kiểm tra trạng thái khả dụng các ngày trong Tháng theo dịch vụ
     * GET /api/v1/clinics/{clinic_id}/month-availability
     */
    public function getMonthAvailability(Request $request, int $clinicId): JsonResponse
    {
        $validator = Validator::make(array_merge($request->all(), ['clinic_id' => $clinicId]), [
            'clinic_id'    => 'required|integer|exists:clinics,id',
            'service_type' => 'required|string|in:implant,veneers',
            'month'        => 'required|date_format:Y-m',
            'timezone'     => 'required|string|timezone',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $serviceType       = $request->query('service_type');
        $clientTz          = $request->query('timezone');
        $monthStr          = $request->query('month');
        $minAllowedTimeUtc = Carbon::now('UTC')->addHours($this->bufferHours);

        $startOfMonthClient = Carbon::createFromFormat('Y-m-d H:i:s', $monthStr . '-01 00:00:00', $clientTz);
        $daysInMonth        = $startOfMonthClient->daysInMonth;

        $datesStatus = [];

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $currentDateClient = $startOfMonthClient->copy()->day($day);
            $dateStr           = $currentDateClient->format('Y-m-d');

            // 1. Chặn ngày quá khứ
            if ($currentDateClient->isPast() && !$currentDateClient->isToday()) {
                $datesStatus[] = ['date' => $dateStr, 'status' => 'disabled', 'reason' => 'past_date'];
                continue;
            }

            // Quy đổi sang ngày theo Giờ VN để kiểm tra Lịch & Ngày lễ
            $startOfDayClinic = $currentDateClient->copy()->setTimezone($this->clinicTz);
            $clinicDateStr    = $startOfDayClinic->format('Y-m-d');

            // 2. Kiểm tra Ngày Lễ (Lấy lễ riêng theo service_type hoặc lễ chung toàn phòng khám)
            $holiday = ClinicHoliday::where('clinic_id', $clinicId)
                ->where('holiday_date', $clinicDateStr)
                ->where(function ($q) use ($serviceType) {
                    $q->where('service_type', $serviceType)
                      ->orWhereNull('service_type');
                })
                ->first();

            if ($holiday && !$holiday->allow_emergency) {
                $datesStatus[] = ['date' => $dateStr, 'status' => 'disabled', 'reason' => 'vietnam_holiday'];
                continue;
            }

            // 3. Kiểm tra Lịch làm việc tuần theo service_type
            $schedule = ClinicSchedule::where('clinic_id', $clinicId)
                ->where('service_type', $serviceType)
                ->where('day_of_week', $startOfDayClinic->dayOfWeek)
                ->where('is_active', true)
                ->first();

            if (!$schedule) {
                $datesStatus[] = ['date' => $dateStr, 'status' => 'disabled', 'reason' => 'clinic_closed'];
                continue;
            }

            // 4. Kiểm tra xem ngày đó có slot trống hợp lệ hay không
            $hasSlots = $this->checkDateAvailability(
                $clinicId,
                $serviceType,
                $dateStr,
                $clientTz,
                $schedule,
                $holiday,
                $minAllowedTimeUtc
            );

            $datesStatus[] = [
                'date'   => $dateStr,
                'status' => $hasSlots ? 'available' : 'disabled',
                'reason' => $hasSlots ? null : 'fully_booked_or_buffered'
            ];
        }

        return response()->json([
            'success' => true,
            'data'    => [
                'service_type' => $serviceType,
                'month'        => $monthStr,
                'timezone'     => $clientTz,
                'dates_status' => $datesStatus
            ]
        ]);
    }

    /**
     * API 2: Lấy danh sách khung giờ trống theo ngày & loại dịch vụ
     * GET /api/v1/clinics/{clinic_id}/available-slots
     */
    public function getAvailableSlots(Request $request, int $clinicId): JsonResponse
    {
        $validator = Validator::make(array_merge($request->all(), ['clinic_id' => $clinicId]), [
            'clinic_id'    => 'required|integer|exists:clinics,id',
            'service_type' => 'required|string|in:implant,veneers',
            'date'         => 'required|date_format:Y-m-d',
            'timezone'     => 'required|string|timezone',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $serviceType       = $request->query('service_type');
        $clientDateStr     = $request->query('date');
        $clientTz          = $request->query('timezone');
        $minAllowedTimeUtc = Carbon::now('UTC')->addHours($this->bufferHours);

        $clientDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $clientDateStr . ' 00:00:00', $clientTz);
        $clinicDateTime = $clientDateTime->copy()->setTimezone($this->clinicTz);
        $clinicDateStr  = $clinicDateTime->format('Y-m-d');

        // 1. Kiểm tra Ngày Lễ
        $holiday = ClinicHoliday::where('clinic_id', $clinicId)
            ->where('holiday_date', $clinicDateStr)
            ->where(function ($q) use ($serviceType) {
                $q->where('service_type', $serviceType)
                  ->orWhereNull('service_type');
            })
            ->first();

        if ($holiday && !$holiday->allow_emergency) {
            return response()->json([
                'success' => true,
                'message' => 'Phòng khám nghỉ ngày lễ: ' . $holiday->title,
                'slots'   => []
            ]);
        }

        // 2. Lấy lịch làm việc theo day_of_week VÀ service_type
        $schedule = ClinicSchedule::where('clinic_id', $clinicId)
            ->where('service_type', $serviceType)
            ->where('day_of_week', $clinicDateTime->dayOfWeek)
            ->where('is_active', true)
            ->first();

        if (!$schedule) {
            return response()->json(['success' => true, 'slots' => []]);
        }

        // 3. Xác định khung giờ mở cửa
        if ($holiday && $holiday->allow_emergency && $holiday->emergency_start_time) {
            $startTimeStr = $holiday->emergency_start_time;
            $endTimeStr   = $holiday->emergency_end_time;
        } else {
            $startTimeStr = $schedule->start_time;
            $endTimeStr   = $schedule->end_time;
        }

        $actualStart   = Carbon::parse($clinicDateStr . ' ' . $startTimeStr, $this->clinicTz);
        $actualEnd     = Carbon::parse($clinicDateStr . ' ' . $endTimeStr, $this->clinicTz);
        $lastSlotStart = $actualEnd->copy()->subMinutes($schedule->slot_duration_minutes);

        if ($actualStart->gte($lastSlotStart)) {
            return response()->json(['success' => true, 'slots' => []]);
        }

        // 4. Lấy các cuộc hẹn đã đặt theo service_type
        $bookedAppointments = Appointment::where('clinic_id', $clinicId)
            ->where('service_type', $serviceType)
            ->where('appointment_date', $clinicDateStr)
            ->whereIn('status', ['pending', 'confirmed'])
            ->get();

        $period = CarbonPeriod::create($actualStart, $schedule->slot_duration_minutes . ' minutes', $lastSlotStart);
        $slots  = [];

        foreach ($period as $slotStartVn) {
            $slotStartClient = $slotStartVn->copy()->setTimezone($clientTz);

            // Kiểm tra Buffer Time
            $isBufferValid = $slotStartVn->copy()->setTimezone('UTC')->gte($minAllowedTimeUtc);

            // Kiểm tra Capacity cho loại dịch vụ này
            $slotFormattedTime = $slotStartVn->format('H:i');
            $countBooked = $bookedAppointments->filter(function ($appointment) use ($slotFormattedTime) {
                return Carbon::parse($appointment->start_time)->format('H:i') === $slotFormattedTime;
            })->count();

            $isCapacityValid = $countBooked < $schedule->max_patients_per_slot;
            $isAvailable     = $isBufferValid && $isCapacityValid;

            $slots[] = [
                'clinic_time_start'   => $slotStartVn->format('H:i:s'),
                'client_time_start'   => $slotStartClient->format('H:i:s'),
                'clinic_time_display' => $slotStartVn->format('H:i'),
                'client_display_time' => $slotStartClient->format('h:i A'),
                'client_display_date' => $slotStartClient->format('D, M d'),
                'is_available'         => $isAvailable,
                'is_emergency'         => (bool)($holiday && $holiday->allow_emergency),
                'remaining_capacity'  => max(0, $schedule->max_patients_per_slot - $countBooked)
            ];
        }

        return response()->json([
            'success' => true,
            'data'    => [
                'service_type'  => $serviceType,
                'date'          => $clientDateStr,
                'timezone'      => $clientTz,
                'is_holiday'    => (bool)$holiday,
                'holiday_title' => $holiday?->title,
                'slots'         => $slots
            ]
        ]);
    }

    /**
     * Helper kiểm tra ngày có slot khả dụng theo loại dịch vụ
     */
    private function checkDateAvailability($clinicId, $serviceType, $clientDateStr, $clientTz, $schedule, $holiday, $minAllowedTimeUtc): bool
    {
        $clientDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $clientDateStr . ' 00:00:00', $clientTz);
        $clinicDateTime = $clientDateTime->copy()->setTimezone($this->clinicTz);
        $clinicDateStr  = $clinicDateTime->format('Y-m-d');

        if ($holiday && $holiday->allow_emergency && $holiday->emergency_start_time) {
            $actualStart = Carbon::parse($clinicDateStr . ' ' . $holiday->emergency_start_time, $this->clinicTz);
            $actualEnd   = Carbon::parse($clinicDateStr . ' ' . $holiday->emergency_end_time, $this->clinicTz);
        } else {
            $actualStart = Carbon::parse($clinicDateStr . ' ' . $schedule->start_time, $this->clinicTz);
            $actualEnd   = Carbon::parse($clinicDateStr . ' ' . $schedule->end_time, $this->clinicTz);
        }

        $lastSlotStart = $actualEnd->copy()->subMinutes($schedule->slot_duration_minutes);
        if ($actualStart->gte($lastSlotStart)) {
            return false;
        }

        // Lấy lịch hẹn đã đặt của dịch vụ này
        $bookedAppointments = Appointment::where('clinic_id', $clinicId)
            ->where('service_type', $serviceType)
            ->where('appointment_date', $clinicDateStr)
            ->whereIn('status', ['pending', 'confirmed'])
            ->get();

        $period = CarbonPeriod::create($actualStart, $schedule->slot_duration_minutes . ' minutes', $lastSlotStart);

        foreach ($period as $slotStartVn) {
            $isBufferValid = $slotStartVn->copy()->setTimezone('UTC')->gte($minAllowedTimeUtc);
            if (!$isBufferValid) {
                continue;
            }

            $slotFormattedTime = $slotStartVn->format('H:i');
            $countBooked = $bookedAppointments->filter(function ($appointment) use ($slotFormattedTime) {
                return Carbon::parse($appointment->start_time)->format('H:i') === $slotFormattedTime;
            })->count();

            if ($countBooked < $schedule->max_patients_per_slot) {
                return true; // Tìm thấy ít nhất 1 slot còn trống -> Ngày khả dụng
            }
        }

        return false;
    }

    public function getAvailableSlots2(Request $request)
    {
        $clinicId = $request->query('clinic_id');
        $serviceType = $request->query('service_type'); // 'implant' hoặc 'veneers'
        $startDate = Carbon::parse($request->query('start'));
        $endDate = Carbon::parse($request->query('end'));

        $events = [];
        $period = CarbonPeriod::create($startDate, $endDate);

        // 1. Lấy tất cả Cấu hình Lịch theo dịch vụ
        $schedules = ClinicSchedule::where('clinic_id', $clinicId)
            ->where('service_type', $serviceType)
            ->where('is_active', true)
            ->get()
            ->keyBy('day_of_week');

        // 2. Lấy tất cả Lịch nghỉ trong khoảng thời gian này
        $holidays = ClinicHoliday::where('clinic_id', $clinicId)
            ->whereBetween('holiday_date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
            ->where(function ($query) use ($serviceType) {
                $query->whereNull('service_type')->orWhere('service_type', $serviceType);
            })
            ->get()
            ->keyBy('holiday_date');

        // 3. Lấy tất cả Đặt lịch thực tế
        $appointments = Appointment::where('clinic_id', $clinicId)
            ->where('service_type', $serviceType)
            ->whereIn('status', ['pending', 'confirmed'])
            ->whereBetween('appointment_date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
            ->get();

        // 4. Duyệt qua từng ngày để sinh ra các Khung giờ (Slots)
        foreach ($period as $date) {
            $dateStr = $date->format('Y-m-d');
            $dayOfWeek = $date->dayOfWeek; // 0: Chủ nhật, 1: Thứ 2,...

            // Kiểm tra xem ngày này có phải Ngày nghỉ Holiday không
            if (isset($holidays[$dateStr])) {
                $events[] = [
                    'title' => '🔒 [NGHỈ LỄ] ' . ($holidays[$dateStr]->title ?? ''),
                    'start' => $dateStr . 'T00:00:00',
                    'end' => $dateStr . 'T23:59:59',
                    'display' => 'background',
                    'backgroundColor' => '#ffc107',
                    'extendedProps' => ['is_blocked' => true]
                ];
                continue; // Bỏ qua không chia slot cho ngày nghỉ
            }

            // Nếu ngày này có cấu hình làm việc
            if (isset($schedules[$dayOfWeek])) {
                $schedule = $schedules[$dayOfWeek];
                $startTime = Carbon::parse($dateStr . ' ' . $schedule->start_time);
                $endTime = Carbon::parse($dateStr . ' ' . $schedule->end_time);
                $slotDuration = $schedule->slot_duration_minutes;
                $maxPatients = $schedule->max_patients_per_slot;

                // Chia nhỏ khung giờ theo slot_duration_minutes
                while ($startTime->lt($endTime)) {
                    $slotStartStr = $startTime->format('Y-m-d H:i:s');
                    $slotEnd = (clone $startTime)->addMinutes($slotDuration);
                    $slotEndStr = $slotEnd->format('Y-m-d H:i:s');

                    if ($slotEnd->gt($endTime)) break;

                    // Đếm số lượng khách đã đặt slot này
                    $bookedCount = $appointments->where('appointment_date', $dateStr)
                        ->where('start_time', $startTime->format('H:i:s'))
                        ->count();

                    $isFull = $bookedCount >= $maxPatients;

                    $events[] = [
                        'title' => $isFull ? "❌ Đã kín ($bookedCount/$maxPatients)" : "🟢 Còn chỗ ($bookedCount/$maxPatients)",
                        'start' => $startTime->toIso8601String(),
                        'end' => $slotEnd->toIso8601String(),
                        'backgroundColor' => $isFull ? '#dc3545' : '#198754',
                        'borderColor' => $isFull ? '#dc3545' : '#198754',
                        'extendedProps' => [
                            'is_full' => $isFull,
                            'booked_count' => $bookedCount,
                            'max_patients' => $maxPatients,
                            'slot_start' => $startTime->format('H:i:s'),
                            'slot_end' => $slotEnd->format('H:i:s'),
                            'appointment_date' => $dateStr
                        ]
                    ];

                    $startTime->addMinutes($slotDuration);
                }
            }
        }

        return response()->json($events);
    }

    // Lấy danh sách khung giờ cho FullCalendar
    public function getEvents(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        $appointments = Appointment::whereBetween('start_time', [$start, $end])->get();

        $events = $appointments->map(function ($item) {
            if ($item->is_blocked) {
                return [
                    'id' => $item->id,
                    'title' => '🔒 [ĐÃ KHÓA] ' . ($item->note ?? 'Khung giờ bận'),
                    'start' => $item->start_time,
                    'end' => $item->end_time,
                    'backgroundColor' => '#6c757d', // Màu xám cho khung giờ block
                    'borderColor' => '#6c757d',
                    'extendedProps' => ['is_blocked' => true]
                ];
            }

            return [
                'id' => $item->id,
                'title' => '👤 ' . $item->customer_name,
                'start' => $item->start_time,
                'end' => $item->end_time,
                'backgroundColor' => '#0d6efd', // Màu xanh cho khách đặt
                'borderColor' => '#0d6efd',
                'extendedProps' => [
                    'is_blocked' => false,
                    'email' => $item->customer_email
                ]
            ];
        });

        return response()->json($events);
    }

    public function toggleAdminBlock(Request $request)
    {
        $request->validate([
            'clinic_id'    => 'required|exists:clinics,id',
            'service_type' => 'required|in:implant,veneers',
            'day_of_week'  => 'required|integer|between:0,6', // 0: CN, 1: T2, ..., 6: T7
            'is_active'    => 'required|boolean',
            'note'         => 'nullable|string|max:255'
        ]);

        return DB::transaction(function () use ($request) {
            // 1. Cập nhật trạng thái trong clinic_schedules
            $schedule = ClinicSchedule::where('clinic_id', $request->clinic_id)
                ->where('service_type', $request->service_type)
                ->where('day_of_week', $request->day_of_week)
                ->first();

            if (!$schedule) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Không tìm thấy cấu hình lịch cho ngày và dịch vụ này!'
                ], 404);
            }

            $schedule->update([
                'is_active' => $request->is_active
            ]);

            $actionText = $request->is_active ? 'mở' : 'khóa';

            // 2. Nếu Khóa (is_active = 0): Hủy/chặn các lịch đặt hiện tại trong các ngày tương ứng tới đây (30 ngày tới)
            if (!$request->is_active) {
                // Lấy danh sách các ngày trong 30 ngày tới rơi vào day_of_week này
                $affectedDates = [];
                $today = Carbon::today();
                for ($i = 0; $i < 30; $i++) {
                    $date = $today->copy()->addDays($i);
                    if ($date->dayOfWeek === (int)$request->day_of_week) {
                        $affectedDates[] = $date->format('Y-m-d');
                    }
                }

                // Cập nhật các cuộc hẹn đã đặt trong các ngày bị khóa thành 'cancelled'
                Appointment::where('clinic_id', $request->clinic_id)
                    ->where('service_type', $request->service_type)
                    ->whereIn('appointment_date', $affectedDates)
                    ->whereIn('status', ['pending', 'confirmed'])
                    ->update([
                        'status' => 'cancelled'
                    ]);
            }

            return response()->json([
                'status'  => 'success',
                'message' => "Đã {$actionText} lịch làm việc cho dịch vụ {$request->service_type} thành công!"
            ]);
        });
    }
}