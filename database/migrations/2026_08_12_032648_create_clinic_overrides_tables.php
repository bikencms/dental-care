<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 2. Bảng đè/ngoại lệ lịch (Cho phép đổi khung giờ hoặc Block ngày/giờ cụ thể)
        Schema::create('clinic_schedule_overrides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id')->constrained('clinics')->onDelete('cascade');
            $table->enum('service_type', ['implant', 'veneers']);
            
            // Ngày áp dụng ngoại lệ (VD: '2026-01-05')
            $table->date('override_date'); 
            
            // Phân loại ngoại lệ: 
            // 'custom_time': Thay đổi khung giờ riêng cho ngày này
            // 'blocked': Khóa hoàn toàn hoặc khóa 1 khoảng giờ
            $table->enum('override_type', ['custom_time', 'blocked'])->default('blocked');
            
            // Thời gian áp dụng ngoại lệ
            // Nếu NULL khi type='blocked' -> Bị khóa NGUYÊN NGÀY
            // Nếu có giờ (VD: 13:00:00 -> 15:00:00) -> Chỉ khóa/đổi KHUNG GIỜ ĐÓ
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            
            $table->string('reason')->nullable(); // Lý do (Bảo trì, nghỉ lễ, bận...)
            $table->timestamps();

            // Truyền tên index tùy chỉnh (Ví dụ: 'cso_clinic_service_date_idx' - 28 ký tự)
            $table->index(['clinic_id', 'service_type', 'override_date'], 'cso_clinic_service_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinic_schedule_overrides');
    }
};