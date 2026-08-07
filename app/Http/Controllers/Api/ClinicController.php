<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

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
}