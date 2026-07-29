<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index(Request $request)
    {
        // $request->services chứa mảng ID dịch vụ khách đã chọn từ bước trước (ví dụ: [1, 2] tương ứng Implant và Veneer)
        $selectedServices = $request->input('services', []); 

        $query = Clinic::with(['doctors', 'services', 'district']);

        // 1. Lọc theo dịch vụ (Bắt buộc phòng khám phải có TẤT CẢ các dịch vụ khách chọn)
        if (!empty($selectedServices)) {
            foreach ($selectedServices as $serviceId) {
                $query->whereHas('services', function ($q) use ($serviceId) {
                    $q->where('services.id', $serviceId);
                });
            }
        }

        // 2. Lọc theo Quận/Huyện (sử dụng mối quan hệ District vừa tạo)
        if ($request->filled('district_id')) {
            $query->where('district_id', $request->district_id);
        }

        // 3. Lọc theo Ngôn ngữ giao tiếp
        if ($request->filled('support_type')) {
            $query->where('support_type', $request->support_type); // ví dụ: 'free_english' hoặc 'paid_interpreter'
        }

        // 4. Lọc theo Chuyên môn Bác sĩ
        if ($request->filled('doctor_specialty')) {
            $query->whereHas('doctors', function ($q) use ($request) {
                $q->where('specialty_tag', $request->doctor_specialty); // ví dụ: 'foreign_trained', 'expert_10_years'
            });
        }

        $clinics = $query->paginate(10);

        return view('clinics.index', compact('clinics', 'selectedServices'));
    }
}