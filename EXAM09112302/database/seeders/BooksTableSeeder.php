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
                'ISBN' => $faker->numberBetween(1,10),
                'publishedYear' => $faker->numberBetween(2000, 2023),
                'genre'=> $faker->sentence(3, true),
            ]);
        };
    }
}
