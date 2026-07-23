<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('online_appointments', function (Blueprint $table) {
            $table->uuid('token')->unique()->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('online_appointments', function (Blueprint $table) {
            $table->dropColumn('token');
        });
    }
};