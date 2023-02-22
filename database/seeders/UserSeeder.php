<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin',
            'password' => Hash::make('admin')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Penulis',
            'email' => 'penulis',
            'password' => Hash::make('penulis')
        ])->assignRole('Penulis');
    }
}
