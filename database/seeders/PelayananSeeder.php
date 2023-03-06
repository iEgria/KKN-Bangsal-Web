<?php

namespace Database\Seeders;

use App\Entities\Pelayanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelayanan::create(["nama" => "KK Hilang", "syarat" => "-"]);
        Pelayanan::create(["nama" => "KK Perubahan", "syarat" => "-"]);
        Pelayanan::create(["nama" => "KTP Hilang", "syarat" => "-"]);
        Pelayanan::create(["nama" => "KTP Baru", "syarat" => "-"]);
        Pelayanan::create(["nama" => "Surat Keterangan Tidak Mampu", "syarat" => "-"]);
        Pelayanan::create(["nama" => "Surat Keterangan Usaha", "syarat" => "-"]);
        Pelayanan::create(["nama" => "Surat Domisili Perusahaan", "syarat" => "-"]);
        Pelayanan::create(["nama" => "Surat Domisili Perorangan", "syarat" => "-"]);
        Pelayanan::create(["nama" => "Surat Boro / Berpergian", "syarat" => "-"]);
        Pelayanan::create(["nama" => "SKCK", "syarat" => "-"]);
        Pelayanan::create(["nama" => "Akta Kelahiran", "syarat" => "-"]);
        Pelayanan::create(["nama" => "Akta Kematian", "syarat" => "-"]);
        Pelayanan::create(["nama" => "Pindah Masuk", "syarat" => "-"]);
        Pelayanan::create(["nama" => "Pindah Keluar", "syarat" => "-"]);
        Pelayanan::create(["nama" => "Santunan Kematian", "syarat" => "-"]);
        Pelayanan::create(["nama" => "Pengajuan Bansos & DTKS", "syarat" => "-"]);
    }
}
