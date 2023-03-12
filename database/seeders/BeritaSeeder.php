<?php

namespace Database\Seeders;

use App\Entities\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;


class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 200; $i++) {
            Berita::create([
                'title' => $faker->realText(20),
                'slug' => Str::slug($faker->realText(20)),
                'cover' => 'cover/kgB13NO7TnBUQ0tNlc9IvPVO6KIVf7BPQVnxVwgR.jpg',
                'content' => $faker->realText(2000),
                'view' => $faker->randomNumber(3, false),
                'published_at' => $faker->date(),
            ]);
        }
    }
}
