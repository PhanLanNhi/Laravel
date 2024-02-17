<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->delete();
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++){
            Author::create([
                'nameAuthor' => $faker->name,
                'specialized' => $faker->randomElement(['Music', 'Art', 'Literature']),
            ]);
        }
    }
}
