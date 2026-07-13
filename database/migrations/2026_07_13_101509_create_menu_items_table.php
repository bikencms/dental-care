<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {

            $table->id();

            $table->foreignId('menu_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('menu_items')
                ->nullOnDelete();

            $table->string('title');

            $table->string('type')->default('custom');
            // custom | page | post | category

            $table->unsignedBigInteger('reference_id')->nullable();

            $table->string('url')->nullable();

            $table->string('target')->default('_self');

            $table->string('icon')->nullable();

            $table->integer('sort_order')->default(0);

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index('reference_id');
            $table->index('type');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};