<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('clinic_holidays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id')->constrained()->onDelete('cascade');
            
            $table->date('holiday_date');                             
            $table->string('title')->nullable();                       
            
            // Null = áp dụng cho tất cả dịch vụ, hoặc chỉ định dịch vụ cụ thể
            $table->enum('service_type', ['implant', 'veneers'])->nullable(); 

            $table->boolean('allow_emergency')->default(false);        
            $table->time('emergency_start_time')->nullable(); 
            $table->time('emergency_end_time')->nullable();
            
            $table->timestamps();

            $table->unique(['clinic_id', 'holiday_date', 'service_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinic_holidays');
    }
};