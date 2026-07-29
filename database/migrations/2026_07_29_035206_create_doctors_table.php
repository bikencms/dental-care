<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id')->constrained('clinics')->onDelete('cascade');
            $table->string('name'); // Tên bác sĩ
            $table->string('avatar')->nullable();
            
            // Các trường phục vụ cho filter Chuyên môn Bác sĩ
            $table->boolean('has_studied_abroad')->default(false); // Tu nghiệp nước ngoài
            $table->boolean('is_expert_10_years')->default(false);  // Chuyên gia 10+ năm
            $table->boolean('has_high_degree')->default(false);     // Bằng cấp cao (Thạc sĩ, Tiến sĩ, CKII...)
            
            $table->string('title')->nullable(); // Chức danh (VD: ThS.BS Trưởng khoa)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};