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

        for($i = 0; $i < 10; $i++){
            Book::create([
                'name' => $faker->name,
                'years' => $faker->date,
                'idAuthor' => $faker->numberBetween(0, 10),
            ]);
        }
    }
}
