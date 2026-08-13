<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClinicScheduleOverride;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    /**
     * 1. Đổi khung giờ làm việc cho NGUYÊN NGÀY cụ thể
     * VD: Ngày 2026-01-05 đổi giờ làm việc thành 10:00 - 18:00
     */
    public function setCustomDayTime(Request $request)
    {
        $request->validate([
            'clinic_id'     => 'required|exists:clinics,id',
            'service_type'  => 'required|in:implant,veneers',
            'override_date' => 'required|date_format:Y-m-d',
            'start_time'    => 'required|date_format:H:i',
            'end_time'      => 'required|date_format:H:i|after:start_time',
            'reason'        => 'nullable|string|max:255',
        ]);

        return DB::transaction(function () use ($request) {
            // Cập nhật hoặc tạo mới cấu hình custom_time cho ngày này
            $override = ClinicScheduleOverride::updateOrCreate(
                [
                    'clinic_id'     => $request->clinic_id,
                    'service_type'  => $request->service_type,
                    'override_date' => $request->override_date,
                    'override_type' => 'custom_time',
                ],
                [
                    'start_time' => Carbon::parse($request->start_time)->format('H:i:s'),
                    'end_time'   => Carbon::parse($request->end_time)->format('H:i:s'),
                    'reason'     => $request->reason ?? 'Thay đổi giờ làm việc riêng cho ngày này',
                ]
            );

            return response()->json([
                'status'  => 'success',
                'message' => "Đã cập nhật khung giờ làm việc ngày {$request->override_date} thành {$request->start_time} - {$request->end_time}!",
                'data'    => $override
            ]);
        });
    }

    /**
     * 2. Khóa (Block) khoảng giờ hoặc nguyên ngày cụ thể
     * VD: Khóa từ 13:00 đến 15:00 ngày 2026-01-05 (hoặc để start/end null để khóa cả ngày)
     */
    public function blockTimeSlot(Request $request)
    {
        $request->validate([
            'clinic_id'     => 'required|exists:clinics,id',
            'service_type'  => 'required|in:implant,veneers',
            'override_date' => 'required|date_format:Y-m-d',
            'is_full_day'   => 'required|boolean',
            'start_time'    => 'nullable|required_if:is_full_day,false|date_format:H:i',
            'end_time'      => 'nullable|required_if:is_full_day,false|date_format:H:i|after:start_time',
            'reason'        => 'nullable|string|max:255',
        ]);

        return DB::transaction(function () use ($request) {
            $startTime = $request->is_full_day ? null : Carbon::parse($request->start_time)->format('H:i:s');
            $endTime   = $request->is_full_day ? null : Carbon::parse($request->end_time)->format('H:i:s');

            // Tạo bản ghi khóa giờ
            $blockRecord = ClinicScheduleOverride::create([
                'clinic_id'     => $request->clinic_id,
                'service_type'  => $request->service_type,
                'override_date' => $request->override_date,
                'override_type' => 'blocked',
                'start_time'    => $startTime,
                'end_time'      => $endTime,
                'reason'        => $request->reason ?? 'Khóa lịch theo yêu cầu Admin',
            ]);

            // Hủy các cuộc hẹn bị ảnh hưởng bởi khung giờ bị khóa
            $query = Appointment::where('clinic_id', $request->clinic_id)
                ->where('service_type', $request->service_type)
                ->where('appointment_date', $request->override_date)
                ->whereIn('status', ['pending', 'confirmed']);

            if (!$request->is_full_day) {
                $query->where(function ($q) use ($startTime, $endTime) {
                    $q->where('start_time', '>=', $startTime)
                      ->where('start_time', '<', $endTime);
                });
            }

            $affectedAppointments = $query->update(['status' => 'cancelled']);

            $timeText = $request->is_full_day ? 'nguyên ngày' : "từ {$request->start_time} đến {$request->end_time}";

            return response()->json([
                'status'  => 'success',
                'message' => "Đã khóa lịch {$timeText} ngày {$request->override_date}. Hủy {$affectedAppointments} cuộc hẹn trùng lịch.",
                'data'    => $blockRecord
            ]);
        });
    }

    /**
     * Xóa bản ghi khóa lịch (Mở khóa slot) theo ID
     */
    public function destroy($id)
    {
        $override = ClinicScheduleOverride::find($id);

        if (!$override) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Không tìm thấy dữ liệu khóa lịch!'
            ], 404);
        }

        // 🛑 Ràng buộc bảo vệ: Không cho mở khóa nếu ngày nằm trong quá khứ
        $overrideDate = Carbon::parse($override->override_date);
        if ($overrideDate->lt(Carbon::today())) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Không thể mở khóa lịch trong quá khứ!'
            ], 422);
        }

        // Xóa bản ghi override
        $override->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Đã mở khóa khung giờ thành công!'
        ]);
    }

    /**
     * 4. Lấy danh sách tất cả các Overrides trong khoảng ngày (Dùng hiển thị lên FullCalendar)
     */
    public function getOverrides(Request $request)
    {
        $request->validate([
            'clinic_id'    => 'required|exists:clinics,id',
            'service_type' => 'required|in:implant,veneers',
            'start_date'   => 'required|date_format:Y-m-d',
            'end_date'     => 'required|date_format:Y-m-d',
        ]);

        $overrides = ClinicScheduleOverride::where('clinic_id', $request->clinic_id)
            ->where('service_type', $request->service_type)
            ->whereBetween('override_date', [$request->start_date, $request->end_date])
            ->get();

        return response()->json([
            'status' => 'success',
            'data'   => $overrides
        ]);
    }

    public function unblockRange(Request $request)
    {
        $request->validate([
            'clinic_id'    => 'required|integer',
            'service_type' => 'required|string',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after_or_equal:start_date',
        ]);

        try {
            // Tìm và XÓA tất cả bản ghi khóa lịch/ngoại lệ nằm trong khoảng ngày được chọn
            $deletedCount = ClinicScheduleOverride::where('clinic_id', $request->clinic_id)
                ->where('service_type', $request->service_type)
                ->whereBetween('override_date', [$request->start_date, $request->end_date])
                ->delete();

            return response()->json([
                'success' => true,
                'message' => "Đã mở khóa thành công! (Xóa {$deletedCount} khoảng thời gian bị khóa)"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi server khi mở khóa: ' . $e->getMessage()
            ], 500);
        }
    }
}