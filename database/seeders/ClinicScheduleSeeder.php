<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\ClinicHoliday;
use App\Models\ClinicSchedule;
use Illuminate\Database\Seeder;

class ClinicScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $clinic = Clinic::first() ?? Clinic::create(['name' => 'Nha Khoa Quốc Tế']);

        // 1. Tạo lịch mặc định 7 ngày trong tuần (07:00 - 19:00)
        for ($day = 0; $day <= 6; $day++) {
            ClinicSchedule::updateOrCreate(
                [
                    'clinic_id'  => $clinic->id,
                    'day_of_week' => $day,
                ],
                [
                    'start_time'            => '07:00:00',
                    'end_time'              => '19:00:00',
                    'slot_duration_minutes' => 30,
                    'max_patients_per_slot' => 2,
                    'is_active'             => true, // Mở cửa tất cả các ngày
                ]
            );
        }

        // 2. Tạo dữ liệu mẫu Ngày Lễ VN
        // Ngày lễ 1: Nghỉ hoàn toàn (Ví dụ: Tết Âm Lịch)
        ClinicHoliday::updateOrCreate(
            ['clinic_id' => $clinic->id, 'holiday_date' => '2026-02-17'],
            [
                'title'           => 'Tết Nguyên Đán',
                'allow_emergency' => false, // Chặn hoàn toàn
            ]
        );

        // Ngày lễ 2: Cho phép đặt lịch Khẩn cấp (Ví dụ: Quốc Khánh 2/9)
        ClinicHoliday::updateOrCreate(
            ['clinic_id' => $clinic->id, 'holiday_date' => '2026-09-02'],
            [
                'title'                => 'Quốc Khánh (Khám Khẩn Cấp)',
                'allow_emergency'      => true, // Cho phép đặt khẩn cấp
                'emergency_start_time' => '08:00:00',
                'emergency_end_time'   => '12:00:00', // Chỉ mở ca sáng khẩn cấp
            ]
        );
    }
}