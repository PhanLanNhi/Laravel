<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Book;
use App\Models\Borrowing;

class BorrowingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('borrowings')->delete();
        $bookIDs = Book::all()->pluck('bookID')->toArray();
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Borrowing::create([
                'bookID' => $faker->randomElement($bookIDs),
                'memberID' => $faker->numberBetween(1, 100),
                'borrowDate' => $faker->date,
                'dueDate' => $faker->date,
                'returnedDate' => $faker->date,
            ]);
        };
    }
}
