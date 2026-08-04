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
            
            // Loai dich vu: implant, veneers
            $table->enum('service_type', ['implant', 'veneers']);

            // 0: Chủ Nhật, 1: Thứ 2, ..., 6: Thứ 7
            $table->unsignedTinyInteger('day_of_week'); 
            
            // Cửa sổ làm việc
            $table->time('start_time')->default('07:00:00');
            $table->time('end_time')->default('19:00:00');
            
            $table->unsignedSmallInteger('slot_duration_minutes')->default(30); 
            $table->unsignedSmallInteger('max_patients_per_slot')->default(1);  
            $table->boolean('is_active')->default(true);                       
            
            $table->timestamps();

            // Unique kết hợp giữa phòng khám, ngày trong tuần và dịch vụ
            $table->unique(['clinic_id', 'day_of_week', 'service_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinic_schedules');
    }
};