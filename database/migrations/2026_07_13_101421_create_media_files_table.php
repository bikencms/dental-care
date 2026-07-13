<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_files', function (Blueprint $table) {

            $table->id();

            $table->foreignId('folder_id')
                ->nullable()
                ->constrained('media_folders')
                ->nullOnDelete();

            $table->string('disk')->default('public');

            $table->string('filename');

            $table->string('original_name');

            $table->string('extension',20);

            $table->string('mime',120);

            $table->unsignedBigInteger('size')->default(0);

            $table->integer('width')->nullable();

            $table->integer('height')->nullable();

            $table->string('path');

            $table->string('alt')->nullable();

            $table->string('caption')->nullable();

            $table->string('credit')->nullable();

            $table->foreignId('uploaded_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            $table->softDeletes();

            $table->index('mime');
            $table->index('disk');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_files');
    }
};