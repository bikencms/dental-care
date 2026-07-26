<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultation_assessments', function (Blueprint $table) {
            $table->id();

            // Liên kết khóa ngoại với bảng appointments (nếu có)
           $table->foreignId('online_appointment_id')
                ->constrained()
                ->cascadeOnDelete();

            // Thông tin cá nhân (Tự động điền)
            $table->string('name');
            $table->string('email');

            // Part 1: Travel & Schedule Information
            $table->date('arrival_date');
            $table->string('length_of_stay'); // ví dụ: "2 weeks", "10 days"

            // --- CÁC TRƯỜNG DÀNH CHO DENTAL IMPLANTS ---
            // Part 2: Missing teeth duration
            $table->enum('missing_teeth_duration', [
                'Less than 6 months',
                '6 months – 2 years',
                'More than 2 years'
            ])->nullable();

            // Part 3: Health condition & Smoking
            $table->enum('health_condition', [
                'Neither',
                'Diabetes',
                'Smoke',
                'Both'
            ])->nullable();
            
            $table->string('smoking_amount')->nullable(); // Lượng thuốc hút/ngày (nếu có chọn Smoke/Both)

            // Part 4: X-Ray Scan
            $table->enum('xray_option', ['upload', 'no_xray'])->nullable();
            $table->string('xray_file_path')->nullable(); // Đường dẫn lưu file trên storage


            // --- CÁC TRƯỜNG DÀNH CHO VENEER (Dự phòng theo code Blade trước) ---
            $table->json('smile_goals')->nullable();        // Lưu mảng checkbox goals (Color, Shape...)
            $table->json('dental_conditions')->nullable();  // Lưu mảng checkbox conditions (Bruxism, Gums...)
            $table->json('smile_photos')->nullable();       // Lưu đường dẫn 3 ảnh nụ cười dạng JSON {"natural": "...", "biting": "...", "closeup": "..."}

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation_assessments');
    }
};