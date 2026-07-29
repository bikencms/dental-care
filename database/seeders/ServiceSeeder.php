<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['name' => 'Dental Implant', 'category' => 'Implant'],
            ['name' => 'Porcelain Veneer', 'category' => 'Veneer'],
            ['name' => 'All-on-4 Implant', 'category' => 'Implant'],
        ];

        foreach ($services as $service) {
            DB::table('services')->insert([
                'name' => $service['name'],
                'slug' => Str::slug($service['name']),
                'category' => $service['category'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}