<?php

namespace Database\Seeders;

use App\Models\ClinicProcedure;
use Illuminate\Database\Seeder;

class ClinicProcedureSeeder extends Seeder
{
    public function run(): void
    {
        $procedures = [
            [
                'clinic_id'          => 1,
                'service_id'         => 2,
                'procedure_name'     => 'Composite Veneer (direct bonding)',
                'procedure_price'    => 4692266,
                'procedure_duration' => '1 day',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 2,
                'procedure_name'     => 'Full Porcelain/Ceramic Crown',
                'procedure_price'    => 15249863,
                'procedure_duration' => '5 - 14 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 2,
                'procedure_name'     => 'Porcelain Fused to Gold Crown',
                'procedure_price'    => 19551107,
                'procedure_duration' => '3 - 7 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 2,
                'procedure_name'     => 'Porcelain Fused to Metal Crown (precious alloy)',
                'procedure_price'    => 15640885,
                'procedure_duration' => '5 - 14 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 2,
                'procedure_name'     => 'Porcelain Fused to Metal Crown (standard alloy)',
                'procedure_price'    => 9384531,
                'procedure_duration' => '3 - 14 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 2,
                'procedure_name'     => 'Porcelain Veneer',
                'procedure_price'    => 13294752,
                'procedure_duration' => '5 - 10 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 1,
                'procedure_name'     => 'Single Dental Implant (Korean Straumann / Osstem)',
                'procedure_price'    => 14500000,
                'procedure_duration' => '1 - 3 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 1,
                'procedure_name'     => 'Premium Swiss Dental Implant (Straumann SLA)',
                'procedure_price'    => 32000000,
                'procedure_duration' => '1 - 3 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 1,
                'procedure_name'     => 'All-on-4 Dental Implants (Full Arch)',
                'procedure_price'    => 130000000,
                'procedure_duration' => '5 - 10 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 1,
                'procedure_name'     => 'All-on-6 Dental Implants (Full Arch)',
                'procedure_price'    => 165000000,
                'procedure_duration' => '7 - 12 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 1,
                'procedure_name'     => 'Bone Grafting for Dental Implant (Ghép xương)',
                'procedure_price'    => 6000000,
                'procedure_duration' => '1 day',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 1,
                'procedure_name'     => 'Sinus Lift Procedure (Nâng xoang)',
                'procedure_price'    => 10000000,
                'procedure_duration' => '1 - 2 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 3, // All-on-4 Implant
                'procedure_name'     => 'All-on-4 Standard (Korean Abutments + Acrylic Bridge)',
                'procedure_price'    => 120000000,
                'procedure_duration' => '5 - 7 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 3,
                'procedure_name'     => 'All-on-4 Premium (Straumann Switzerland + Zirconia Bridge)',
                'procedure_price'    => 175000000,
                'procedure_duration' => '7 - 10 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 3,
                'procedure_name'     => 'All-on-4 Immediate Loading Temporary Bridge (Hàm tạm tức thì)',
                'procedure_price'    => 15000000,
                'procedure_duration' => '1 - 2 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 3,
                'procedure_name'     => 'All-on-4 Final Permanent Zirconia Bridge Upgrade',
                'procedure_price'    => 45000000,
                'procedure_duration' => '5 - 7 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 3,
                'procedure_name'     => 'All-on-4 Surgical Guide Design & 3D Impression',
                'procedure_price'    => 5000000,
                'procedure_duration' => '1 day',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 3,
                'procedure_name'     => 'All-on-4 Maintenance, Cleaning & Screw Tightening Check',
                'procedure_price'    => 2000000,
                'procedure_duration' => '1 day',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 1,
                'procedure_name'     => 'Single Dental Implant (Korean Straumann / Osstem)',
                'procedure_price'    => 14500000,
                'procedure_duration' => '1 - 3 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 1,
                'procedure_name'     => 'Premium Swiss Dental Implant (Straumann SLA)',
                'procedure_price'    => 32000000,
                'procedure_duration' => '1 - 3 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 1,
                'procedure_name'     => 'All-on-4 Dental Implants (Full Arch)',
                'procedure_price'    => 130000000,
                'procedure_duration' => '5 - 10 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 1,
                'procedure_name'     => 'All-on-6 Dental Implants (Full Arch)',
                'procedure_price'    => 165000000,
                'procedure_duration' => '7 - 12 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 1,
                'procedure_name'     => 'Bone Grafting for Dental Implant (Ghép xương)',
                'procedure_price'    => 6000000,
                'procedure_duration' => '1 day',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 1,
                'procedure_name'     => 'Sinus Lift Procedure (Nâng xoang)',
                'procedure_price'    => 10000000,
                'procedure_duration' => '1 - 2 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 2,
                'procedure_name'     => 'Composite Veneer (direct bonding)',
                'procedure_price'    => 4692266,
                'procedure_duration' => '1 day',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 2,
                'procedure_name'     => 'Full Porcelain/Ceramic Crown',
                'procedure_price'    => 15249863,
                'procedure_duration' => '5 - 14 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 2,
                'procedure_name'     => 'Porcelain Fused to Gold Crown',
                'procedure_price'    => 19551107,
                'procedure_duration' => '3 - 7 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 2,
                'procedure_name'     => 'Porcelain Fused to Metal Crown (precious alloy)',
                'procedure_price'    => 15640885,
                'procedure_duration' => '5 - 14 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 2,
                'procedure_name'     => 'Porcelain Fused to Metal Crown (standard alloy)',
                'procedure_price'    => 9384531,
                'procedure_duration' => '3 - 14 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 2,
                'procedure_name'     => 'Porcelain Veneer',
                'procedure_price'    => 13294752,
                'procedure_duration' => '5 - 10 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 3,
                'procedure_name'     => 'All-on-4 Standard (Korean Abutments + Acrylic Bridge)',
                'procedure_price'    => 120000000,
                'procedure_duration' => '5 - 7 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 3,
                'procedure_name'     => 'All-on-4 Premium (Straumann Switzerland + Zirconia Bridge)',
                'procedure_price'    => 175000000,
                'procedure_duration' => '7 - 10 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 3,
                'procedure_name'     => 'All-on-4 Immediate Loading Temporary Bridge (Hàm tạm tức thì)',
                'procedure_price'    => 15000000,
                'procedure_duration' => '1 - 2 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 3,
                'procedure_name'     => 'All-on-4 Final Permanent Zirconia Bridge Upgrade',
                'procedure_price'    => 45000000,
                'procedure_duration' => '5 - 7 days',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 3,
                'procedure_name'     => 'All-on-4 Surgical Guide Design & 3D Impression',
                'procedure_price'    => 5000000,
                'procedure_duration' => '1 day',
            ],
            [
                'clinic_id'          => 1,
                'service_id'         => 3,
                'procedure_name'     => 'All-on-4 Maintenance, Cleaning & Screw Tightening Check',
                'procedure_price'    => 2000000,
                'procedure_duration' => '1 day',
            ],
        ];

        foreach ($procedures as $item) {
            ClinicProcedure::create($item);
        }
    }
}