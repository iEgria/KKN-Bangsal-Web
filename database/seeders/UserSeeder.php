<?php

namespace Database\Seeders;

use App\Entities\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin',
            'name' => 'Administrator',
            'password' => Hash::make('admin'),
        ])->assignRole('Admin');
    }
}
