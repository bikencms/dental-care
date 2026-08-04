<?php

namespace App\Http\Controllers\Api;

use App\Models\Appointment;
use App\Models\OnlineAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Lưu thông tin Lịch hẹn mới vào DB
     */
    public function store(Request $request)
    {
        // 1. Validator thủ công để dễ trả về JSON 422
        $validator = Validator::make($request->all(), [
            'clinic_id'        => 'required|exists:clinics,id',
            'service_type'     => 'required|string|max:255', // <-- Bổ sung validate service_type
            'patient_name'     => 'required|string|max:255',
            'patient_email'    => 'required|email|max:255',
            'patient_phone'    => 'required|string|max:20',
            'notes'            => 'nullable|string|max:1000',
            'appointment_date' => 'required|date_format:Y-m-d',
            'start_time'       => 'required|date_format:H:i:s',
        ], [
            'service_type.required'     => 'Vui lòng chọn loại dịch vụ.', // Message lỗi tùy chọn
            'patient_name.required'     => 'Vui lòng nhập họ và tên.',
            'patient_email.required'    => 'Vui lòng nhập địa chỉ email.',
            'patient_email.email'       => 'Định dạng email không hợp lệ.',
            'patient_phone.required'    => 'Vui lòng nhập số điện thoại.',
            'appointment_date.required' => 'Vui lòng chọn ngày khám.',
            'start_time.required'       => 'Vui lòng chọn một khung giờ khám.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Thông tin không hợp lệ.',
                'errors'  => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();

        try {
            // 2. Lưu vào CSDL
            $appointment = Appointment::create([
                'clinic_id'        => $validated['clinic_id'],
                'service_type'     => $validated['service_type'], // <-- Bổ sung lưu service_type
                'patient_name'     => $validated['patient_name'],
                'patient_email'    => $validated['patient_email'],
                'patient_phone'    => $validated['patient_phone'],
                'notes'            => $validated['notes'] ?? null,
                'appointment_date' => $validated['appointment_date'],
                'start_time'       => $validated['start_time'],
                'status'           => 'pending',
            ]);

            OnlineAppointment::where('email', $validated['patient_email'])->update(
                ['status' => 'confirmed']
            );

            return response()->json([
                'success' => true,
                'message' => 'Đặt lịch khám thành công!',
                'data'    => $appointment
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi hệ thống: Không thể lưu lịch hẹn. Vui lòng thử lại sau.'
            ], 500);
        }
    }
}