<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;
use App\Models\ClinicSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
}