<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Khoi tao doi tuong Faker
        $faker = Faker::create();
        // Chay vong lap xac dinh So ban ghi va Kieu du lieu tu Faker
        for($i = 0; $i < 50; $i++) {
            Post::create([
                //  1 cau 6 tu
                'title' => $faker->sentence(6, true),
                // 3 doan van
                'body' => $faker->paragraphs(3, true),
            ]);
        }
    }
}
