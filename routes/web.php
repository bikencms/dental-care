<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;
use App\Http\Controllers\ConsultationAssessmentController;
use App\Http\Controllers\BookingAppointmentController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\AppointmentController;

Route::get('/generate-sitemap', function () {
    SitemapGenerator::create(config('app.url'))
        ->writeToFile(public_path('sitemap.xml'));
    return 'Sitemap generated!';
});

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'vi|en'],
    'middleware' => 'localization',
], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
});

Route::get('/about-us', function () {
    return view('about_us');
})->name('about-us');

Route::middleware('localization')->group(function () {
    Route::get('/', function() { return view('welcome'); })->name('home');
    Route::get('/about-us', function() { return view('about_us'); })->name('about-us');
    Route::get('/contact-us', function() { return view('contact_us'); })->name('contact-us');
    Route::get('/consultation/{token}', [ProfileController::class, 'show'])->name('consultation');
    Route::get('/booking-appointment', [BookingAppointmentController::class, 'index'])->name('booking-appointment.index');
    Route::post('/consultation-assessment/{id}', [ConsultationAssessmentController::class, 'store'])->name('consultation.store');
    // Route cho danh sách phòng khám và bộ lọc
    Route::get('/clinics/{token}', [ClinicController::class, 'index'])->name('clinics.index');

    // Route trang chi tiết phòng khám (chứa thông tin chi tiết và form đặt lịch ở cuối trang với id="#booking-section")
    Route::get('/clinics/{token}/{id}', [ClinicController::class, 'show'])->name('clinics.show');

    // Xử lý Submit Form đặt lịch hẹn mới
    Route::post('/booking', [AppointmentController::class, 'store'])->name('appointments.store');
});

Route::prefix('{locale}')
    ->where(['locale' => 'vi|ja|ko'])
    ->middleware('localization')
    ->group(function () {
    Route::get('/', function() { return view('welcome'); })->name('locale.home');
    Route::get('/about-us', function() { return view('about_us'); })->name('locale.about-us');
    Route::get('/contact-us', function() { return view('contact_us'); })->name('locale.contact-us');
    Route::get('/consultation/{token}', [ProfileController::class, 'consultation'])->name('locale.consultation');
    Route::get('/booking-appointment', [BookingAppointmentController::class, 'index'])->name('locale.booking-appointment.index');
    // Route cho danh sách phòng khám và bộ lọc
    Route::get('/clinics/{token}', [ClinicController::class, 'index2'])->name('locale.clinics.index');

    // Route trang chi tiết phòng khám (chứa thông tin chi tiết và form đặt lịch ở cuối trang với id="#booking-section")
    Route::get('/clinics/{token}/{id}', [ClinicController::class, 'show2'])->name('locale.clinics.show');

    // Xử lý Submit Form đặt lịch hẹn mới
    Route::post('/booking', [AppointmentController::class, 'store2'])->name('locale.appointments.store');
});

Route::middleware('auth')->group(function () {
    Route::view(
        '/dashboard',
        'dashboard'
    )->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
