<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'code' => 'admin',
                'name' => 'Admin',
                'password' => Hash::make('P@ssw0rd'),
                'email_verified_at' => now(),
            ]
        );
    }
}