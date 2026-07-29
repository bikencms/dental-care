<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id')->constrained('clinics')->onDelete('cascade');
            
            // Thông tin khách hàng được lưu sẵn từ luồng email chuyển đến trang
            $table->string('customer_name')->nullable();
            $table->string('customer_email'); // Dùng để định danh khách từ email luồng xử lý
            $table->string('customer_phone')->nullable();
            
            // Dịch vụ khách đã chọn trước đó
            $table->string('selected_services'); // Lưu dịch vụ (Implant, Veneer hoặc cả 2)
            
            // Trạng thái đặt lịch & thời gian
            $table->dateTime('appointment_time');
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->text('notes')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};