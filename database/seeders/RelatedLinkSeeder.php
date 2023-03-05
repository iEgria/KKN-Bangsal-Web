<?php

namespace Database\Seeders;

use App\Entities\RelatedLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelatedLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RelatedLink::create([
            'title' => 'Pemkot Kediri',
            'url' => 'https://kedirikota.go.id',
        ]);
        RelatedLink::create([
            'title' => 'Sakti',
            'url' => 'https://disdukcapil.kedirikota.go.id/sakti',
        ]);
        RelatedLink::create([
            'title' => 'KSWI',
            'url' => 'https://kswi.kedirikota.go.id',
        ]);
        RelatedLink::create([
            'title' => 'OSS',
            'url' => 'https://oss.go.id',
        ]);
    }
}
