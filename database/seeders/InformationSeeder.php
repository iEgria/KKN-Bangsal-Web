<?php

namespace Database\Seeders;

use App\Entities\GeneralInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralInformation::create([
            'email' => 'pelayanan.kel.bangsal@gmail.com',
            'phone' => '(0354) 699797',
            'instagram' => 'kelurahan_bangsal'
        ]);
    }
}
