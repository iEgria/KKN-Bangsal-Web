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
            'instagram' => 'kelurahan_bangsal',
            'sejarah_desa' => 'Nama bangsal yang berarti Tempat Peristirahatan diambil dari sejarah ketika masa peperangan dimana tempat yang sekarang menjadi kelurahan bangal ini digunakan sebagai tempat peristirahatan oleh pasukan pangeran Diponegoro yang sedang berperang dari Jawa Barat ke Jawa Timur.',
            'visi_misi' => '-',
        ]);
    }
}
