<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClinicSchedule;
use App\Models\ClinicHoliday;
use App\Models\Clinic;
use Carbon\Carbon;

class ClinicScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $clinics = Clinic::all();

        foreach( $clinics as $clinic ) {
            $clinicId = $clinic->id; // Giả định ID phòng khám là 1

            // 1. TẠO LỊCH LÀM VIỆC TUẦN (CLINIC SCHEDULES)
            // Dịch vụ 1: Implant (Mỗi ca 60 phút, tối đa 1 khách/slot)
            for ($day = 0; $day <= 6; $day++) {
                ClinicSchedule::updateOrCreate(
                    [
                        'clinic_id'    => $clinicId,
                        'day_of_week'  => $day,
                        'service_type' => 'implant',
                    ],
                    [
                        'start_time'            => '08:00:00',
                        'end_time'              => '18:00:00',
                        'slot_duration_minutes' => 60,
                        'max_patients_per_slot' => 1,
                        'is_active'             => ($day !== 0), // Nghỉ Chủ Nhật
                    ]
                );
            }

            // Dịch vụ 2: Veneers (Mỗi ca 30 phút, tối đa 2 khách/slot)
            for ($day = 0; $day <= 6; $day++) {
                ClinicSchedule::updateOrCreate(
                    [
                        'clinic_id'    => $clinicId,
                        'day_of_week'  => $day,
                        'service_type' => 'veneers',
                    ],
                    [
                        'start_time'            => '07:30:00',
                        'end_time'              => '19:00:00',
                        'slot_duration_minutes' => 30,
                        'max_patients_per_slot' => 1,
                        'is_active'             => true, // Mở tất cả các ngày
                    ]
                );
            }

            // 2. TẠO NGÀY LỄ / NGÀY NGHĨ (CLINIC HOLIDAYS)
            
            // Trường hợp A: Ngày lễ nghỉ hoàn toàn cho TOÀN PHÒNG KHÁM (service_type = null)
            ClinicHoliday::updateOrCreate(
                [
                    'clinic_id'    => $clinicId,
                    'holiday_date' => Carbon::now()->addDays(5)->format('Y-m-d'),
                    'service_type' => null,
                ],
                [
                    'title'                => 'Nghỉ bảo trì phòng khám',
                    'allow_emergency'      => false,
                    'emergency_start_time' => null,
                    'emergency_end_time'   => null,
                ]
            );

            // Trường hợp B: Ngày lễ có mở ca Khẩn Cấp riêng cho dịch vụ IMPLANT
            ClinicHoliday::updateOrCreate(
                [
                    'clinic_id'    => $clinicId,
                    'holiday_date' => Carbon::now()->addDays(10)->format('Y-m-d'),
                    'service_type' => 'implant',
                ],
                [
                    'title'                => 'Ngày Lễ - Chỉ trực khẩn cấp Implant',
                    'allow_emergency'      => true,
                    'emergency_start_time' => '09:00:00',
                    'emergency_end_time'   => '12:00:00',
                ]
            );
        }
    }
}