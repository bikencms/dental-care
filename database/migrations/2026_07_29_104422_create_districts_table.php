<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên quận/huyện (Ví dụ: Quận 1, Quận 5)
            $table->unsignedBigInteger('city_id')->nullable(); // Hoặc liên kết với bảng cities nếu có
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};