<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Artwork;

class ArtworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artworks')->delete();

        $faker = Faker::create();

        for($i = 0; $i < 10; $i++){
            Artwork::create([
                'artist_name'=> $faker->name,
                'description' => $faker->sentence(7, true),
                'art_type' => $faker->randomElement(['art','music','literature']),
                'media_link' => $faker->url(),
                'cover_image' => $faker->url(),
            ]);
        }
    }
}
