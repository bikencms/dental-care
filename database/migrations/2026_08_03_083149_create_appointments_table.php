<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id')->constrained()->onDelete('cascade');
            
            // Thông tin cá nhân bệnh nhân
            $table->string('patient_name');
            $table->string('patient_email');
            $table->string('patient_phone');
            $table->text('notes')->nullable();

            // Thông tin Ngày & Giờ khám (Lưu theo chuẩn Giờ Việt Nam - Asia/Ho_Chi_Minh)
            $table->date('appointment_date'); // YYYY-MM-DD
            $table->time('start_time');       // HH:MM:SS
            $table->time('end_time')->nullable();

            // Múi giờ của bệnh nhân lúc chọn (chuẩn IANA, VD: America/Los_Angeles)
            $table->string('patient_timezone')->default('Asia/Ho_Chi_Minh');

            // Trạng thái lịch hẹn: pending, confirmed, cancelled, completed
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');

            $table->timestamps();

            // Index tối ưu tốc độ query kiểm tra trùng lịch
            $table->index(['clinic_id', 'appointment_date', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};