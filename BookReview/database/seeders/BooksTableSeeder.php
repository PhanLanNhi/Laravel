<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->delete();
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Book::create([
                'title'=> $faker->title,
                'author'=> $faker->name,
                'genre'=> $faker->randomElement(['romatic', 'detective', 'blockbuster', 'comedy']),
                'publicationYear' => $faker->year,
                'ISBN' => $faker->numberBetween(1,5),
                'coverImageURL' => $faker->imageUrl(200, 200, 'CoverImageURL', true),
            ]);
        };
    }
}
