<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@inc2solutions.com',
            'password' => Hash::make('G=mtKxN0%67z'),
            'user_type' => 1,
        ]);

        User::create([
            'name' => 'Staff',
            'email' => 'staff@inc2solutions.com',
            'password' => Hash::make('password'),
            'user_type' => 2,
        ]);
    }
}