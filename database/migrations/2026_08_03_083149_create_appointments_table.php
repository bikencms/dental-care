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
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Nếu có quản lý User

            // Thông tin dịch vụ đặt lịch
            $table->enum('service_type', ['implant', 'veneers']);

            // Ngày và giờ hẹn
            $table->date('appointment_date');
            $table->time('start_time');
            $table->time('end_time')->nullable();

            // Thông tin khách hàng
            $table->string('patient_name');
            $table->string('patient_phone');
            $table->string('patient_email')->nullable();
            $table->text('notes')->nullable();

            // Trạng thái cuộc hẹn
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};