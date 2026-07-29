<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('clinics', function (Blueprint $table) {
            // Thêm cột district_id (cho phép null hoặc đặt sau một cột nào đó tùy ý)
            $table->unsignedBigInteger('district_id')->nullable()->after('id');
            
            // Nếu bạn muốn tạo khóa ngoại liên kết chuẩn (tùy chọn):
            // $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('clinics', function (Blueprint $table) {
            $table->dropColumn('district_id');
        });
    }
};
