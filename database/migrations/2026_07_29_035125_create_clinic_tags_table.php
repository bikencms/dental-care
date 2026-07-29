<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clinic_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id')->constrained('clinics')->onDelete('cascade');
            $table->string('tag_name'); // Tên tag hiển thị trong block nhỏ (VD: "ISO Certified", "100% Imported Materials",...)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinic_tags');
    }
};