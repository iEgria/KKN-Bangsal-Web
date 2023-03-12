<?php

namespace Database\Seeders;

use App\Entities\RtRw;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RtRwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rtrw = [
            ['SURADI' => ['SADMOKO', 'TAUFAN KURNIAWAN', 'IKWAN DARSONO', 'TRI RAHAYU', 'BAMBANG AJI WAHONO', 'КОКОК MARIYONO', 'NURLINA PRASETYOWATI']],
            ['SUWADJI' => ['MASRUKIN', 'SUPRIANTO', 'SURONO', 'M. ALI MASHAR', 'SUHARIYANTO', 'NUR HIDAYAT', 'HADI SUTRISNO BUDI SANTOSO']],
            ['SUKAMSI' => ['AHMAD PITONO', 'SAMIRAN', 'EKO PRAMONO', 'SUYADI', 'YUDI KRISTIANTO', 'MARGONO']],
            ['UMI RETNO SARI' => ['SUWANDIANTO', 'MULYA SANTOSO', 'GERRY TOMI', 'YUDI KUKUH / BAGONG', 'UMAYAH', 'SUNARYO', 'BUDI WIYONO']],
            ['GIJONO' => ['JARNO', 'SULISTYO UTOMO', 'IMAM GOZALI', 'EKO PURWANTO']],
            ['MOH. THOYIB' => ['KIRNO', 'IDA NURHAYATI', 'WOLO WAHYUDI', 'KASMUDJIANTO']]
        ];

        foreach ($rtrw as $rwNumber => $rws) {
            foreach ($rws as $namaRw => $rw) {
                $ketuaRw = RtRw::create([
                    'rw_number' => $rwNumber + 1,
                    'nama' => $namaRw
                ]);
                foreach ($rw as $rtNumber => $namaRt) {
                    RtRw::create([
                        'rt_rw_id' => $ketuaRw->id,
                        'rt_number' => $rtNumber + 1,
                        'nama' => $namaRt
                    ]);
                }
            }
        }
    }
}
