<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('doctors')->delete();

        $faker = Faker::create();

        for($i = 0; $i < 20; $i++){
            Doctor::create([
                "nameDoctor" => $faker->name,
                "specialist" => $faker->jobTitle,
            ]);
        }
    }
}
