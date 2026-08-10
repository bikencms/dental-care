<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ClinicBookingApiController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\ClinicController;

Route::post('/contacts', [ContactController::class, 'store']);
Route::prefix('v1')->group(function () {
    Route::prefix('clinics/{clinic_id}')->group(function () {
        // 1. API Lấy danh sách trạng thái ngày trong tháng theo loại dịch vụ
        // GET /api/v1/clinics/1/month-availability?service_type=implant&month=2026-08&timezone=America/Los_Angeles
        Route::get('/month-availability', [ClinicBookingApiController::class, 'getMonthAvailability'])
            ->name('api.clinics.month-availability');

        // 2. API Lấy danh sách khung giờ (Slots) khả dụng theo ngày & loại dịch vụ
        // GET /api/v1/clinics/1/available-slots?service_type=implant&date=2026-08-03&timezone=America/Los_Angeles
        Route::get('/available-slots', [ClinicBookingApiController::class, 'getAvailableSlots'])
            ->name('api.clinics.available-slots');
    });

    Route::post('/clinics/bulk-delete', [ClinicController::class, 'bulkDelete']);
    Route::post('/clinics/bulk-restore', [ClinicController::class, 'bulkRestore']);

    // Đặt trong nhóm route Admin/Clinic của bạn
    Route::post('/clinics/{clinicId}/schedules/save', [ClinicController::class, 'saveScheduleByService'])
    ->name('api.clinic-schedules.save-service');

});
Route::post('/booking', [AppointmentController::class, 'store']);
