<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use App\Models\OnlineAppointment;

class ClinicController extends Controller
{
    public function index(string $token, Request $request)
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
            $supportType = $request->support_type;

            $query->whereHas('languages', function ($q) use ($supportType) {
                if ($supportType === 'free_english') {
                    $q->where('has_free_english_support', true);
                } elseif ($supportType === 'paid_interpreter') {
                    $q->where('has_paid_interpreter', true);
                }
            });
        }

        // 4. Lọc theo Chuyên môn Bác sĩ
        if ($request->filled('doctor_specialty')) {
            $specialty = $request->doctor_specialty;

            $query->whereHas('doctors', function ($q) use ($specialty) {
                if ($specialty === 'foreign_trained') {
                    $q->where('has_studied_abroad', true);
                } elseif ($specialty === 'expert_10_years') {
                    $q->where('is_expert_10_years', true);
                } elseif ($specialty === 'high_degree') {
                    $q->where('has_high_degree', true);
                }
            });
        }

        $appointment = OnlineAppointment::where('token', $token)->firstOrFail();

        $clinics = $query->paginate(10);

        return view('clinics.index', compact('clinics', 'selectedServices', 'appointment'));
    }

    public function index2(string $language, string $token, Request $request)
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
            $supportType = $request->support_type;

            $query->whereHas('languages', function ($q) use ($supportType) {
                if ($supportType === 'free_english') {
                    $q->where('has_free_english_support', true);
                } elseif ($supportType === 'paid_interpreter') {
                    $q->where('has_paid_interpreter', true);
                }
            });
        }

        // 4. Lọc theo Chuyên môn Bác sĩ
        if ($request->filled('doctor_specialty')) {
            $specialty = $request->doctor_specialty;

            $query->whereHas('doctors', function ($q) use ($specialty) {
                if ($specialty === 'foreign_trained') {
                    $q->where('has_studied_abroad', true);
                } elseif ($specialty === 'expert_10_years') {
                    $q->where('is_expert_10_years', true);
                } elseif ($specialty === 'high_degree') {
                    $q->where('has_high_degree', true);
                }
            });
        }

        $appointment = OnlineAppointment::where('token', $token)->firstOrFail();

        $clinics = $query->paginate(10);

        return view('clinics.index', compact('clinics', 'selectedServices', 'appointment'));
    }

    public function show(string $token, int $id)
    {
        $appointment = OnlineAppointment::where('token', $token)->firstOrFail();
        
        $clinic = Clinic::with([
            'languages', 
            'services', 
            'doctors', 
            'tags',
            'district'
        ])->findOrFail($id);

        return view('clinics.show', compact('clinic', 'appointment'));
    }

    public function show2(string $language, string $token, int $id)
    {
        $appointment = OnlineAppointment::where('token', $token)->firstOrFail();
        
        $clinic = Clinic::with([
            'languages', 
            'services', 
            'doctors', 
            'tags',
            'district'
        ])->findOrFail($id);

        return view('clinics.show', compact('clinic', 'appointment'));
    }
}