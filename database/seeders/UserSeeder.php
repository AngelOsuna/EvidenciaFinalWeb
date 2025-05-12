<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@halcon.com',
                'password' => Hash::make('password'),
                'role_id' => 1, // Admin
            ],
            [
                'name' => 'Sales User',
                'email' => 'sales@halcon.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // Sales
            ],
        ]);
    }
}
