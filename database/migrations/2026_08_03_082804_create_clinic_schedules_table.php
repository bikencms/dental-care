<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clinic_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id')->constrained()->onDelete('cascade');
            
            // 0: Chủ Nhật, 1: Thứ 2, ..., 6: Thứ 7
            $table->unsignedTinyInteger('day_of_week'); 
            
            // Mặc định cửa sổ làm việc 07:00:00 -> 19:00:00 (Giờ Việt Nam)
            $table->time('start_time')->default('07:00:00');
            $table->time('end_time')->default('19:00:00');
            
            $table->unsignedSmallInteger('slot_duration_minutes')->default(30); // Độ dài mỗi ca (phút)
            $table->unsignedSmallInteger('max_patients_per_slot')->default(1);  // Số bệnh nhân tối đa / slot
            $table->boolean('is_active')->default(true);                       // Trạng thái ngày làm việc
            
            $table->timestamps();

            $table->unique(['clinic_id', 'day_of_week']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinic_schedules');
    }
};