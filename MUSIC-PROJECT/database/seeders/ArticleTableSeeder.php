<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//  use faker
use Faker\Factory as Faker;
use App\Models\Article;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i = 0; $i < 50; $i++){
            Article::create([
                'ma_bviet' => $i + 1,
                'tieude' => $faker->sentence(10, true),
                'ten_bhat' => $faker->sentence(5, true),
                'ma_tloai' => $faker->numberBetween(1, 50),
                // 'ma_tloai' => 1,
                'tomtat' => $faker->paragraph(1, true),
                'noidung' => $faker->paragraph(3, true),
                'ma_tgia' => $faker->numberBetween(1, 20),
                // 'ngayviet' => $faker->sentence(),
                'hinhanh' => $faker->imageUrl(640, 480, 'animals', true),
            ]);
        }
    }
}
