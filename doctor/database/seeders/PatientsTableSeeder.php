<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Doctor;
use App\Models\Patient;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('patients')->delete();
        $idDoctors = Doctor::all()->pluck('id')->toArray();
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++) {
            Patient::create([
                'namePatient' => $faker->name,
                'day' => $faker->date,
                'symptom' => $faker->sentences(2, true),
                'idDoctor' => $faker->randomElement($idDoctors),
                'image' => $faker->imageUrl(200, 200, 'Patient', true)
            ]);
        };
    }
}
