<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clinic_procedures', function (Blueprint $table) {
            $table->id();
            
            // Khóa ngoại liên kết bảng clinics
            $table->foreignId('clinic_id')->constrained('clinics')->onDelete('cascade');
            
            // Khóa ngoại liên kết bảng services
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            
            $table->string('procedure_name');
            $table->decimal('procedure_price', 15, 2)->default(0); // Giá tiền (VND)
            $table->string('procedure_duration')->comment('Thời gian thực hiện tính bằng ngày'); // Phút
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinic_procedures');
    }
};