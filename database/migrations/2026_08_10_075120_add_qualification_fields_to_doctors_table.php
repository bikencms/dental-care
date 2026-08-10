<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function Up(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            // 3 field cũ của bạn (giữ lại để làm mốc đặt vị trí sau `has_high_degree`)
            // $table->boolean('has_studied_abroad')->default(false); // foreign_trained
            // $table->boolean('is_expert_10_years')->default(false);  // expert_10_years
            // $table->boolean('has_high_degree')->default(false);     // prof_phd

            // Thêm 4 field mới tương ứng với các lựa chọn lọc:
            $table->boolean('is_association_leader')->default(false)->after('has_high_degree'); 
            // Lãnh đạo các Hiệp hội Nha khoa (association_leaders)

            $table->boolean('is_foreign_expat')->default(false)->after('is_association_leader'); 
            // Bác sĩ Nha khoa người nước ngoài (foreign_expat_dentists)

            $table->boolean('is_international_member')->default(false)->after('is_foreign_expat'); 
            // Thành viên Hiệp hội Quốc tế (international_members)

            $table->boolean('is_trainer_speaker')->default(false)->after('is_international_member'); 
            // Giảng viên / Báo cáo viên Quốc tế (trainers_speakers)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn([
                'is_association_leader',
                'is_foreign_expat',
                'is_international_member',
                'is_trainer_speaker',
            ]);
        });
    }
};