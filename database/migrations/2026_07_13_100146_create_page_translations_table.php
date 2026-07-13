<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_translations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('page_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('locale',10)->default('en');

            $table->string('title');

            $table->string('slug')->unique();

            $table->longText('content')->nullable();

            $table->string('seo_title')->nullable();

            $table->text('seo_description')->nullable();

            $table->text('seo_keywords')->nullable();

            $table->string('canonical_url')->nullable();

            $table->string('robots')->default('index,follow');

            $table->string('og_title')->nullable();

            $table->text('og_description')->nullable();

            $table->string('og_image')->nullable();

            $table->json('schema')->nullable();

            $table->timestamps();

            $table->unique(['page_id','locale']);

            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_translations');
    }
};