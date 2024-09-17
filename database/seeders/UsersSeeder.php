<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sireta.com',
            'password' => bcrypt('admin123'),
            'role' => 1
        ]);

        User::create([
            'name' => 'Fasihll',
            'email' => 'fasihullisan091966@gmail.com',
            'password' => bcrypt('fasih123'),
            'role' => 2
        ]);
    }
}
