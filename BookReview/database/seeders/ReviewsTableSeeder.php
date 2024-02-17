<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Book;
use App\Models\User;
use App\Models\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->delete();
        $bookIDs = Book::all()->pluck('bookID')->toArray();
        $userIDs = User::all()->pluck('id')->toArray();
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Review::create([
                'bookID' => $faker->randomElement($bookIDs),
                'userID' => $faker->randomElement($userIDs),
                'rating' => $faker->numberBetween(1,5),
                'reviewText' => $faker->paragraph(1),
                'reviewDate' => $faker->date,
            ]);
        };
    }
}
