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

class ClinicBookingApiController extends Controller
{
    protected int $bufferHours = 24; // Buffer time: Bắt buộc đặt trước 24 tiếng
    protected string $clinicTz = 'Asia/Ho_Chi_Minh'; // Luôn cố định giờ VN

    /**
     * API 1: Kiểm tra trạng thái khả dụng các ngày trong Tháng
     * GET /api/v1/clinics/{clinic_id}/month-availability
     */
    public function getMonthAvailability(Request $request, int $clinicId): JsonResponse
    {
        $validator = Validator::make(array_merge($request->all(), ['clinic_id' => $clinicId]), [
            'clinic_id' => 'required|integer|exists:clinics,id',
            'month'     => 'required|date_format:Y-m',
            'timezone'  => 'required|string|timezone',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $clientTz = $request->query('timezone');
        $monthStr = $request->query('month');
        $minAllowedTimeUtc = Carbon::now('UTC')->addHours($this->bufferHours);

        $startOfMonthClient = Carbon::createFromFormat('Y-m-d H:i:s', $monthStr . '-01 00:00:00', $clientTz);
        $daysInMonth = $startOfMonthClient->daysInMonth;

        $datesStatus = [];

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $currentDateClient = $startOfMonthClient->copy()->day($day);
            $dateStr = $currentDateClient->format('Y-m-d');

            // 1. Chặn ngày quá khứ
            if ($currentDateClient->isPast() && !$currentDateClient->isToday()) {
                $datesStatus[] = ['date' => $dateStr, 'status' => 'disabled', 'reason' => 'past_date'];
                continue;
            }

            // Quy đổi sang ngày theo Giờ VN để kiểm tra Lịch & Ngày lễ
            $startOfDayClinic = $currentDateClient->copy()->setTimezone($this->clinicTz);
            $clinicDateStr = $startOfDayClinic->format('Y-m-d');

            // 2. Kiểm tra Ngày Lễ VN (ClinicHoliday)
            $holiday = ClinicHoliday::where('clinic_id', $clinicId)
                ->where('holiday_date', $clinicDateStr)
                ->first();

            if ($holiday) {
                // Nếu là ngày lễ và KHÔNG cho phép đặt khẩn cấp -> DISABLE
                if (!$holiday->allow_emergency) {
                    $datesStatus[] = ['date' => $dateStr, 'status' => 'disabled', 'reason' => 'vietnam_holiday'];
                    continue;
                }
            }

            // 3. Kiểm tra Lịch làm việc tuần
            $schedule = ClinicSchedule::where('clinic_id', $clinicId)
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
                'month'        => $monthStr,
                'timezone'     => $clientTz,
                'dates_status' => $datesStatus
            ]
        ]);
    }

    /**
     * API 2: Lấy danh sách khung giờ trống (Đã convert timezone & Giới hạn 07:00 - 19:00 VN)
     * GET /api/v1/clinics/{clinic_id}/available-slots
     */
    public function getAvailableSlots(Request $request, int $clinicId): JsonResponse
    {
        $validator = Validator::make(array_merge($request->all(), ['clinic_id' => $clinicId]), [
            'clinic_id' => 'required|integer|exists:clinics,id',
            'date'      => 'required|date_format:Y-m-d',
            'timezone'  => 'required|string|timezone',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $clientDateStr = $request->query('date');
        $clientTz = $request->query('timezone');
        $minAllowedTimeUtc = Carbon::now('UTC')->addHours($this->bufferHours);

        $clientDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $clientDateStr . ' 00:00:00', $clientTz);
        $clinicDateTime = $clientDateTime->copy()->setTimezone($this->clinicTz);
        $clinicDateStr  = $clinicDateTime->format('Y-m-d');

        // Kiểm tra Ngày Lễ
        $holiday = ClinicHoliday::where('clinic_id', $clinicId)
            ->where('holiday_date', $clinicDateStr)
            ->first();

        if ($holiday && !$holiday->allow_emergency) {
            return response()->json([
                'success' => true,
                'message' => 'Phòng khám nghỉ ngày lễ: ' . $holiday->title,
                'slots'   => []
            ]);
        }

        // Lấy lịch làm việc tuần
        $schedule = ClinicSchedule::where('clinic_id', $clinicId)
            ->where('day_of_week', $clinicDateTime->dayOfWeek)
            ->where('is_active', true)
            ->first();

        if (!$schedule) {
            return response()->json(['success' => true, 'slots' => []]);
        }

        // Xác định khung giờ mở cửa (Ưu tiên giờ Khẩn cấp nếu là Ngày lễ Khẩn cấp)
        if ($holiday && $holiday->allow_emergency && $holiday->emergency_start_time) {
            $startTimeStr = $holiday->emergency_start_time;
            $endTimeStr   = $holiday->emergency_end_time;
        } else {
            $startTimeStr = $schedule->start_time; // Mặc định 07:00:00
            $endTimeStr   = $schedule->end_time;   // Mặc định 19:00:00
        }

        $actualStart = Carbon::parse($clinicDateStr . ' ' . $startTimeStr, $this->clinicTz);
        $actualEnd   = Carbon::parse($clinicDateStr . ' ' . $endTimeStr, $this->clinicTz);
        $lastSlotStart = $actualEnd->copy()->subMinutes($schedule->slot_duration_minutes);

        if ($actualStart->gte($lastSlotStart)) {
            return response()->json(['success' => true, 'slots' => []]);
        }

        $bookedAppointments = Appointment::where('clinic_id', $clinicId)
            ->where('appointment_date', $clinicDateStr)
            ->whereIn('status', ['pending', 'confirmed'])
            ->get();

        $period = CarbonPeriod::create($actualStart, $schedule->slot_duration_minutes . ' minutes', $lastSlotStart);
        $slots = [];

        foreach ($period as $slotStartVn) {
            $slotStartClient = $slotStartVn->copy()->setTimezone($clientTz);

            // Kiểm tra Buffer Time
            $isBufferValid = $slotStartVn->copy()->setTimezone('UTC')->gte($minAllowedTimeUtc);

            // Kiểm tra Số lượng bệnh nhân đặt
            $countBooked = $bookedAppointments->where('start_time', $slotStartVn->format('H:i:s'))->count();
            $isCapacityValid = $countBooked < $schedule->max_patients_per_slot;

            $isAvailable = $isBufferValid && $isCapacityValid;

            $slots[] = [
                'clinic_time_start'   => $slotStartVn->format('H:i:s'),
                'client_time_start'   => $slotStartClient->format('H:i:s'),
                'clinic_time_display' => $slotStartVn->format('H:i'),
                'client_display_time' => $slotStartClient->format('h:m A'),
                'client_display_date' => $slotStartClient->format('D, M d'),
                'is_available'         => $isAvailable,
                'is_emergency'         => (bool)($holiday && $holiday->allow_emergency),
                'remaining_capacity'  => max(0, $schedule->max_patients_per_slot - $countBooked)
            ];
        }

        return response()->json([
            'success' => true,
            'data'    => [
                'date'         => $clientDateStr,
                'timezone'     => $clientTz,
                'is_holiday'   => (bool)$holiday,
                'holiday_title'=> $holiday?->title,
                'slots'        => $slots
            ]
        ]);
    }

    /**
     * Helper kiểm tra ngày có slot khả dụng
     */
    private function checkDateAvailability($clinicId, $clientDateStr, $clientTz, $schedule, $holiday, $minAllowedTimeUtc): bool
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
        if ($actualStart->gte($lastSlotStart)) return false;

        $bookedAppointments = Appointment::where('clinic_id', $clinicId)
            ->where('appointment_date', $clinicDateStr)
            ->whereIn('status', ['pending', 'confirmed'])
            ->get();

        $period = CarbonPeriod::create($actualStart, $schedule->slot_duration_minutes . ' minutes', $lastSlotStart);

        foreach ($period as $slotStartVn) {
            $isBufferValid = $slotStartVn->copy()->setTimezone('UTC')->gte($minAllowedTimeUtc);
            if (!$isBufferValid) continue;

            $countBooked = $bookedAppointments->where('start_time', $slotStartVn->format('H:i:s'))->count();
            if ($countBooked < $schedule->max_patients_per_slot) {
                return true;
            }
        }

        return false;
    }
}