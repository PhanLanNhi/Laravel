<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Author;
use App\Models\Article;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("articles")->delete();
        $idAuthors = Author::all()->pluck("id")->toArray();
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++){
            Article::create([
                'nameArticle' => $faker->name,
                'content' => $faker->sentences(3, true),
                'day' => $faker->date,
                'idAuthor' => $faker->randomElement($idAuthors),
                'img' => $faker->imageUrl(200, 200, 'Article', true)
            ]);
        }
    }
}
