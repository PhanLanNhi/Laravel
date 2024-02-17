<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Author;
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
        $author_ids = Author::all()->pluck('id')->toArray();
        for($i = 0; $i < 10; $i++){
            Book::create([
                'nameBook' => $faker->name,
                'price' => $faker->randomFloat(2, 50, 200),
                'image' => $faker->imageUrl(200, 200, 'Book', true),
                'publishDate' => $faker->date('Y-m-d', 'now'),
                'authorId' => $faker->randomElement($author_ids),
            ]);
        }
    }
}
