<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClinicSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Tạo Phòng khám 1 (Có cả Implant và Veneer - Quận 1)
        $clinic1Id = DB::table('clinics')->insertGetId([
            'name' => 'International Dental Smile Hub',
            'slug' => Str::slug('International Dental Smile Hub'),
            'city' => 'Ho Chi Minh City',
            'district' => 'District 1',
            'district_id' => 1, // ID của Quận 1 trong bảng districts
            'address' => '123 Le Loi Street, Ben Nghe Ward',
            'image' => 'images/clinics/clinic-1.jpg',
            'description' => 'A state-of-the-art dental clinic located in the heart of District 1, specializing in advanced dental implants and aesthetic veneers. We offer world-class international standards with experienced specialists trained overseas.',
            'rating' => 4.9,
            'review_count' => 245,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Tạo Phòng khám 2 (Chỉ có Implant - Quận 5)
        $clinic2Id = DB::table('clinics')->insertGetId([
            'name' => 'Saigon Advanced Implant Center',
            'slug' => Str::slug('Saigon Advanced Implant Center'),
            'city' => 'Ho Chi Minh City',
            'district' => 'District 5',
            'district_id' => 5, // ID của Quận 5 trong bảng districts
            'address' => '456 Nguyen Trai Street',
            'image' => 'images/clinics/clinic-2.jpg',
            'description' => 'Dedicated exclusively to complex implant procedures and restorative dentistry. Equipped with cutting-edge 3D CT scanning technology and a team of medical experts with over 10 years of clinical practice.',
            'rating' => 4.8,
            'review_count' => 180,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // --- GÁN DỮ LIỆU LIÊN QUAN CHO CLINIC 1 ---
        // Dịch vụ & Giá khởi điểm
        DB::table('clinic_services')->insert([
            ['clinic_id' => $clinic1Id, 'service_id' => 1, 'starting_price' => 650.00, 'unit' => 'trụ Implant'],
            ['clinic_id' => $clinic1Id, 'service_id' => 2, 'starting_price' => 350.00, 'unit' => 'răng Veneer'],
            ['clinic_id' => $clinic1Id, 'service_id' => 3, 'starting_price' => 5000.00, 'unit' => 'gói All-on-4'],
        ]);

        // Ngôn ngữ hỗ trợ (Option 1: Free English Support)
        DB::table('clinic_languages')->insert([
            'clinic_id' => $clinic1Id,
            'has_free_english_support' => true,
            'has_paid_interpreter' => false,
            'interpreter_hourly_rate' => 20.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tags hiển thị trên banner
        DB::table('clinic_tags')->insert([
            ['clinic_id' => $clinic1Id, 'tag_name' => 'ISO Certified'],
            ['clinic_id' => $clinic1Id, 'tag_name' => '100% Imported Materials'],
            ['clinic_id' => $clinic1Id, 'tag_name' => 'Lifetime Warranty'],
        ]);

        // Bác sĩ
        DB::table('doctors')->insert([
            [
                'clinic_id' => $clinic1Id,
                'name' => 'Dr. John Nguyen',
                'avatar' => 'images/doctors/doc-1.jpg',
                'has_studied_abroad' => true,
                'is_expert_10_years' => true,
                'has_high_degree' => true,
                'title' => 'M.D., Implant Specialist (Trained in France)',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);


        // --- GÁN DỮ LIỆU LIÊN QUAN CHO CLINIC 2 ---
        // Dịch vụ & Giá khởi điểm
        DB::table('clinic_services')->insert([
            ['clinic_id' => $clinic2Id, 'service_id' => 1, 'starting_price' => 600.00, 'unit' => 'trụ Implant'],
        ]);

        // Ngôn ngữ hỗ trợ (Option 2: Paid Interpreter)
        DB::table('clinic_languages')->insert([
            'clinic_id' => $clinic2Id,
            'has_free_english_support' => false,
            'has_paid_interpreter' => true,
            'interpreter_hourly_rate' => 20.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tags
        DB::table('clinic_tags')->insert([
            ['clinic_id' => $clinic2Id, 'tag_name' => 'Dedicated Implant Center'],
            ['clinic_id' => $clinic2Id, 'tag_name' => 'Advanced 3D Imaging'],
        ]);

        // Bác sĩ
        DB::table('doctors')->insert([
            [
                'clinic_id' => $clinic2Id,
                'name' => 'Dr. Tran Minh',
                'avatar' => 'images/doctors/doc-2.jpg',
                'has_studied_abroad' => false,
                'is_expert_10_years' => true,
                'has_high_degree' => true,
                'title' => 'Chief Surgeon, 15+ Years Experience',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}