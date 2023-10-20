<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Patient;
use App\Models\Doctor;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('patients')->delete();

        $faker = Faker::create();
        $doctor_ids = Doctor::all()->pluck('idDoctor')->toArray();

        for($i = 0; $i < 20; $i++){
            Patient::create([
                "namePatient" => $faker->name,
                "day" => $faker->date,
                "symptom" => $faker->sentences(3, true),
                "idDoctor" => $faker->randomElement($doctor_ids),
            ]);
        }
    }
}
