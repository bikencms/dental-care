<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {

            $table->id();

            $table->string('template')->default('default');

            $table->string('status')->default('draft');

            $table->boolean('is_home')->default(false);

            $table->boolean('is_system')->default(false);

            $table->string('featured_image')->nullable();

            $table->json('blocks')->nullable();

            $table->timestamp('published_at')->nullable();

            $table->timestamp('expired_at')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();

            $table->softDeletes();

            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};