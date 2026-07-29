<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên phòng khám
            $table->string('slug')->unique();
            $table->string('city'); // Thành phố (VD: Ho Chi Minh City)
            $table->string('district'); // Quận (VD: District 1)
            $table->string('address'); // Địa chỉ chi tiết
            $table->string('image'); // Hình ảnh chính hiển thị ở list & hero banner
            $table->text('description'); // Đoạn văn ngắn ~3 câu mô tả phòng khám
            $table->decimal('rating', 3, 2)->default(5.00); // Đánh giá (VD: 4.9)
            $table->integer('review_count')->default(0); // Số lượng review (VD: 200)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinics');
    }
};