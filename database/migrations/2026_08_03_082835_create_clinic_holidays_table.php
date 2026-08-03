<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clinic_holidays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id')->constrained()->onDelete('cascade');
            
            $table->date('holiday_date');                             // Ngày lễ (YYYY-MM-DD)
            $table->string('title')->nullable();                       // Tên ngày lễ (VD: Tết Nguyên Đán, Quốc Khánh)
            
            // Cờ cho phép Đặt lịch khẩn cấp trong ngày lễ
            $table->boolean('allow_emergency')->default(false);        
            
            // Nếu cho phép khẩn cấp, có thể cấu hình khung giờ riêng cho ngày lễ đó (Mặc định null = lấy 07:00-19:00)
            $table->time('emergency_start_time')->nullable(); 
            $table->time('emergency_end_time')->nullable();
            
            $table->timestamps();

            $table->unique(['clinic_id', 'holiday_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinic_holidays');
    }
};