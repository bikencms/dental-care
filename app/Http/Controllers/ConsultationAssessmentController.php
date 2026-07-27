<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConsultationAssessment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\OnlineAppointment;

class ConsultationAssessmentController extends Controller
{
    public function store(Request $request, $appointment_id)
    {
        // 1. Kiểm tra Appointment có tồn tại không
        $appointment = OnlineAppointment::findOrFail($appointment_id);

        // 2. Validate dữ liệu đầu vào
        $validated = $request->validate([
            'name'                   => 'required|string|max:255',
            'email'                  => 'required|email|max:255',
            'arrival_date'           => 'required|date',
            'length_of_stay'         => 'required|string|max:255',

            // Các trường Implant (Chỉ required nếu có gửi lên)
            'missing_teeth_duration' => 'nullable|string',
            'health_condition'       => 'nullable|string',
            'smoking_amount'         => 'nullable|string|max:255',
            'xray_option'            => 'nullable|in:upload,no_xray',
            'xray_file'              => 'nullable|file|mimes:jpeg,png,jpg,pdf,zip,dcm|max:20480', // Max 20MB

            // Các trường Veneer (Chỉ required nếu dạng Veneer)
            'smile_goals'            => 'nullable|array',
            'dental_conditions'      => 'nullable|array',
            'smile_photos'           => 'nullable|array',
            'smile_photos.*'         => 'nullable|image|mimes:jpeg,png,jpg|max:10240', // Max 10MB/ảnh
        ]);

        try {
            DB::beginTransaction();

            // 3. Xử lý Upload file X-Ray (Nếu có)
            $xrayFilePath = null;
            if ($request->hasFile('xray_file') && $request->xray_option === 'upload') {
                // Lưu vào folder storage/app/public/xrays
                $xrayFilePath = $request->file('xray_file')->store('xrays', 'public');
            }

            // 4. Xử lý Upload 3 ảnh Smile Photos của Veneer (Nếu có)
            $smilePhotoPaths = [];
            if ($request->hasFile('smile_photos')) {
                foreach ($request->file('smile_photos') as $key => $photoFile) {
                    if ($photoFile && $photoFile->isValid()) {
                        // Lưu dạng ["natural" => "photos/xxx.jpg", "biting" => "...", "closeup" => "..."]
                        $smilePhotoPaths[$key] = $photoFile->store('smile_photos', 'public');
                    }
                }
            }

            // 5. Khởi tạo hoặc cập nhật (updateOrCreate) thông tin đánh giá
            ConsultationAssessment::updateOrCreate(
                ['online_appointment_id' => $appointment->id], // Khóa ngoại kết nối
                [
                    'name'                   => $validated['name'],
                    'email'                  => $validated['email'],
                    'arrival_date'           => $validated['arrival_date'],
                    'length_of_stay'         => $validated['length_of_stay'],
                    
                    // Implants Data
                    'missing_teeth_duration' => $request->input('missing_teeth_duration'),
                    'health_condition'       => $request->input('health_condition'),
                    'smoking_amount'         => $request->input('smoking_amount'),
                    'xray_option'            => $request->input('xray_option'),
                    'xray_file_path'         => $xrayFilePath ?? $appointment->assessment->xray_file_path ?? null,

                    // Veneers Data (Cột kiểu JSON trong DB)
                    'smile_goals'            => $request->input('smile_goals', []),
                    'dental_conditions'      => $request->input('dental_conditions', []),
                    'smile_photos'           => !empty($smilePhotoPaths) ? $smilePhotoPaths : ($appointment->assessment->smile_photos ?? []),
                ]
            );

            // 6. Cập nhật trạng thái Appointment (nếu cần)
            $appointment->update(['status' => 'pending']);

            DB::commit();

            return redirect()->back()->with('success', __('consultation.success'));

        } catch (\Exception $e) {
            DB::rollBack();

            // Xóa file vừa upload nếu gặp lỗi khi lưu DB
            if ($xrayFilePath) {
                Storage::disk('public')->delete($xrayFilePath);
            }
            foreach ($smilePhotoPaths as $path) {
                Storage::disk('public')->delete($path);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', __('consultation.error') . $e->getMessage());
        }
    }
}