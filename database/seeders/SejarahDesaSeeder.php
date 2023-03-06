<?php

namespace Database\Seeders;

use App\Entities\SejarahDesa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SejarahDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SejarahDesa::create([
            'sejarah_desa' => 'Nama bangsal yang berarti Tempat Peristirahatan diambil dari sejarah ketika masa peperangan dimana tempat yang sekarang menjadi kelurahan bangal ini digunakan sebagai tempat peristirahatan oleh pasukan pangeran Diponegoro yang sedang berperang dari Jawa Barat ke Jawa Timur.',
        ]);
    }
}
