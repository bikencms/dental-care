<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\ClinicController;
use App\Http\Controllers\Auth\MyClinicController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Route::get('register', [RegisteredUserController::class, 'create'])
    //     ->name('register');

    // Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    //     ->name('password.request');

    // Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    //     ->name('password.email');

    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    //     ->name('password.reset');

    // Route::post('reset-password', [NewPasswordController::class, 'store'])
    //     ->name('password.store');
});

Route::middleware([
    'auth',
])->group(function () {
    // Route::get('verify-email', EmailVerificationPromptController::class)
    //     ->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    //     ->middleware(['signed', 'throttle:6,1'])
    //     ->name('verification.verify');

    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //     ->middleware('throttle:6,1')
    //     ->name('verification.send');

    // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    //     ->name('password.confirm');

    // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::prefix('dashboard')->middleware(['auth'])->group(function () {

    // ==========================================
    // 1. NHÓM ROUTE DÀNH RIÊNG CHO ADMIN
    // ==========================================
    Route::middleware(['role:Admin'])->group(function () {
        Route::get('/appointment', [UserController::class, 'index'])->name('dashboard.user.list');
        
        // Quản lý tất cả Clinic
        Route::get('/clinic', [ClinicController::class, 'index'])->name('dashboard.clinic.list');
        Route::get('/clinic/{id}', [ClinicController::class, 'show'])->name('dashboard.clinic.show');
        Route::post('/clinic', [ClinicController::class, 'store'])->name('dashboard.clinic.store');
    });

    // ==========================================
    // 2. NHÓM ROUTE DÀNH CHO USER (CHỦ CLINIC)
    // ==========================================
    Route::middleware(['role:User|Admin'])->prefix('my-clinic')->name('my-clinic.')->group(function () {
        Route::get('/', [MyClinicController::class, 'index'])->name('index');         // Xem phòng khám của tôi
        Route::get('/edit', [MyClinicController::class, 'edit'])->name('edit');       // Form chỉnh sửa
        Route::put('/update', [MyClinicController::class, 'update'])->name('update'); // Cập nhật thông tin
        Route::delete('/destroy', [MyClinicController::class, 'destroy'])->name('destroy'); // Xóa phòng khám

        // Thêm dịch vụ, quy trình, bác sĩ vào Clinic của mình
        Route::post('/services', [MyClinicController::class, 'storeService'])->name('services.store');
        Route::post('/procedures', [MyClinicController::class, 'storeProcedure'])->name('procedures.store');
        Route::post('/doctors', [MyClinicController::class, 'storeDoctor'])->name('doctors.store');
    });

});