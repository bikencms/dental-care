<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            [
                'email' => 'admin@example.com'
            ],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password')
            ]
        );

        User::updateOrCreate(
            [
                'email' => 'thy.nguyen85@gmail.com'
            ],
            [
                'name' => 'Administrator',
                'password' => Hash::make('hRSE0D0J#5al')
            ]
        );

        $user->assignRole('Admin');
    }
}