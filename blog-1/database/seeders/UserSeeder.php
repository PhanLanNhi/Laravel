<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Profile;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // list all method of Faker: tìm hiểu các hàm để gọi
        $faker = Faker::create();

        for($i=0; $i<50; $i++){
            $user = User::create([
                'name' => $faker->name,
                'password' => bcrypt('password123')
            ]);

            $profile = Profile::create([
                'user_id' => $user->id
            ]);
        }
    }
}
