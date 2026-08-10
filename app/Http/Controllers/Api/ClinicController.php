<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;
use App\Models\ClinicSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
use App\Models\ClinicHoliday;
class ClinicController extends Controller
{
    public function bulkDelete(Request $request)
    {
        // 1. Validate dữ liệu đầu vào
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:clinics,id',
        ]);

        $ids = $request->input('ids');

        // 2. Thực hiện xóa mềm (Soft Delete)
        // Vì Model Clinic đã dùng SoftDeletes nên hàm delete() sẽ tự động cập nhật deleted_at
        $deletedCount = Clinic::whereIn('id', $ids)->delete();

        // 3. Trả về kết quả JSON cho JS
        return response()->json([
            'success' => true,
            'message' => "Đã xóa thành công {$deletedCount} phòng khám.",
            'deleted_count' => $deletedCount
        ], 200);
    }

    // API Khôi phục nhiều
    public function bulkRestore(Request $request)
    {
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:clinics,id',
        ]);

        // Sử dụng onlyTrashed() để truy vấn các record đã bị Soft Delete
        $restoredCount = Clinic::onlyTrashed()
            ->whereIn('id', $request->ids)
            ->restore();

        return response()->json([
            'success' => true,
            'message' => "Đã khôi phục thành công {$restoredCount} phòng khám.",
        ]);
    }

    public function saveScheduleByService(Request $request, $clinicId)
    {
        $request->validate([
            'service_type'            => 'required|in:implant,veneers',
            'schedules'               => 'array',
            'schedules.*.day_of_week' => 'required|integer|between:0,6',
            'schedules.*.start_time'  => 'required|date_format:H:i',
            'schedules.*.end_time'    => 'required|date_format:H:i|after:schedules.*.start_time',
        ]);

        $serviceType = $request->input('service_type');
        $schedules   = $request->input('schedules', []);

        DB::beginTransaction();
        // 2. Duyệt từng dòng và dùng updateOrCreate để cập nhật hoặc tạo mới
        foreach ($schedules as $item) {
            $dayOfWeek = $item['day_of_week'];
            $startTime = Carbon::parse($item['start_time']);
            $endTime   = Carbon::parse($item['end_time']);

            while ($startTime->lt($endTime)) {
                $slotStart = $startTime->format('H:i:00');
                $slotEnd   = $startTime->addMinutes(30)->format('H:i:00');

                // Dùng updateOrCreate để tránh lỗi Duplicate Key
                ClinicSchedule::updateOrCreate(
                    [
                        // CÁC CỘT ĐIỀU KIỆN TÌM KIẾM (Match Unique Key)
                        'clinic_id'    => $clinicId,
                        'service_type' => $serviceType,
                        'day_of_week' => $dayOfWeek,
                    ],
                    [
                        // CÁC CỘT CẬP NHẬT HOẶC TẠO MỚI
                        'start_time'   => $slotStart,
                        'end_time'              => $slotEnd,
                        'slot_duration_minutes' => 30,
                        'max_patients_per_slot' => 1,
                        'is_active'             => 1, // Kích hoạt lại slot này
                    ]
                );
            }
        }

        DB::commit();

        return response()->json([
            'success'     => true,
            'message'     => 'Lưu khung giờ cho dịch vụ ' . strtoupper($serviceType) . ' thành công!',
        ]);
    }

    /**
     * Khách hàng gửi Yêu cầu Đặt Lịch
     */
    public function storeBooking(Request $request)
    {
        $request->validate([
            'clinic_id' => 'required|exists:clinics,id',
            'service_type' => 'required|in:implant,veneers',
            'appointment_date' => 'required|date_format:Y-m-d',
            'start_time' => 'required|date_format:H:i:s',
            'patient_name' => 'required|string|max:255',
            'patient_phone' => 'required|string|max:20',
            'patient_email' => 'nullable|email|max:255',
            'notes' => 'nullable|string'
        ]);

        $date = Carbon::parse($request->appointment_date);
        $dayOfWeek = $date->dayOfWeek;

        // 1. Kiểm tra Ngày nghỉ Holiday
        $isHoliday = ClinicHoliday::where('clinic_id', $request->clinic_id)
            ->where('holiday_date', $request->appointment_date)
            ->where(function ($q) use ($request) {
                $q->whereNull('service_type')->orWhere('service_type', $request->service_type);
            })->exists();

        if ($isHoliday) {
            return response()->json(['message' => 'Phòng khám nghỉ vào ngày này!'], 422);
        }

        // 2. Lấy Cấu hình Khung giờ
        $schedule = ClinicSchedule::where('clinic_id', $request->clinic_id)
            ->where('service_type', $request->service_type)
            ->where('day_of_week', $dayOfWeek)
            ->where('is_active', true)
            ->first();

        if (!$schedule) {
            return response()->json(['message' => 'Dịch vụ không hoạt động vào ngày này!'], 422);
        }

        // 3. Tính end_time dựa vào slot_duration_minutes
        $endTime = Carbon::parse($request->start_time)
            ->addMinutes($schedule->slot_duration_minutes)
            ->format('H:i:s');

        // 4. Kiểm tra giới hạn max_patients_per_slot
        $currentBookings = Appointment::where('clinic_id', $request->clinic_id)
            ->where('service_type', $request->service_type)
            ->where('appointment_date', $request->appointment_date)
            ->where('start_time', $request->start_time)
            ->whereIn('status', ['pending', 'confirmed'])
            ->count();

        if ($currentBookings >= $schedule->max_patients_per_slot) {
            return response()->json(['message' => 'Khung giờ này đã đủ số lượng bệnh nhân!'], 422);
        }

        // 5. Lưu Đặt Lịch
        $appointment = Appointment::create([
            'clinic_id' => $request->clinic_id,
            'service_type' => $request->service_type,
            'appointment_date' => $request->appointment_date,
            'start_time' => $request->start_time,
            'end_time' => $endTime,
            'patient_name' => $request->patient_name,
            'patient_phone' => $request->patient_phone,
            'patient_email' => $request->patient_email,
            'notes' => $request->notes,
            'status' => 'pending'
        ]);

        return response()->json(['message' => 'Đặt lịch thành công!', 'data' => $appointment]);
    }

    /**
     * Admin đặt Ngày Nghỉ (Block Lịch theo Ngày/Dịch vụ)
     */
    public function storeHoliday(Request $request)
    {
        $request->validate([
            'clinic_id' => 'required|exists:clinics,id',
            'holiday_date' => 'required|date',
            'title' => 'nullable|string|max:255',
            'service_type' => 'nullable|in:implant,veneers'
        ]);

        $holiday = ClinicHoliday::updateOrCreate(
            [
                'clinic_id' => $request->clinic_id,
                'holiday_date' => $request->holiday_date,
                'service_type' => $request->service_type,
            ],
            [
                'title' => $request->title ?? 'Nghỉ đột xuất / Đóng cửa',
            ]
        );

        return response()->json(['message' => 'Đã thêm ngày nghỉ thành công!', 'data' => $holiday]);
    }
}