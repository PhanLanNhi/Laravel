<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Book;
use App\Models\Author;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->delete();

        $faker = Faker::create();

        $idAuthors = Author::all()->pluck('id')->toArray();

        for($i = 0; $i < 10; $i++){
            Book::create([
                'nameBook' => $faker->name,
                'years' => $faker->date,
                'idAuthor' => $faker->randomElement($idAuthors),
                'img' => $faker->imageUrl(200, 200, null, true)
            ]);
        }
    } 
}
