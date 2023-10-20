<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Song;
use App\Models\Category;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("songs")->delete();
        $idCate = Category::all()->pluck("id")->toArray();
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++){
            Song::create([
                "nameSong"=> $faker->name,
                "singer"=> $faker->name,
                // "idCategory" => $faker->numberBetween(0, 10),
                "idCategory" => $faker->randomElement($idCate),

            ]);
        }
    }
}
