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

        $user->assignRole('Admin');
    }
}