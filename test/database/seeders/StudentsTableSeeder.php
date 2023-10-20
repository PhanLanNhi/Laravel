<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Student;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i = 0; $i < 10; $i++){
            Student::create([
                "name"=> $faker->name,
                "email"=> $faker->email,
                "gender"=> $faker->randomElement(['male', 'female', 'other']),
                "phone"=> $faker->numerify('##########'),
                "idClass" => $faker->numberBetween(0, 5)
            ]);
        }
    }
}
