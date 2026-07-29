<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clinic_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id')->constrained('clinics')->onDelete('cascade');
            // Option 1: English Support Included (Free) => true/false
            $table->boolean('has_free_english_support')->default(false);
            // Option 2: Dedicated Private Interpreter ($20/hour) => true/false
            $table->boolean('has_paid_interpreter')->default(false);
            $table->decimal('interpreter_hourly_rate', 8, 2)->default(20.00);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinic_languages');
    }
};