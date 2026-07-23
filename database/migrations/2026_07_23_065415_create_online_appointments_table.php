<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('online_appointments', function (Blueprint $table) {
            $table->id();

            $table->string('fullname');
            $table->string('email')->nullable();
            $table->string('phone', 20);
            $table->string('interest')->nullable();
            $table->text('briefly')->nullable();

            $table->enum('status', [
                'pending',
                'confirmed',
                'finished',
                'cancelled'
            ])->default('pending');

            $table->string('language',10)->default('en');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('online_appointments');
    }
};