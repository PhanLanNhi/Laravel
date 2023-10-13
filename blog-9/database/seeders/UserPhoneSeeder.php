<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Phone;

class UserPhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
        ->has(Phone::factory()->state(function (array $attributes, User $user) {
            return ['user_id' => $user->id];
        }))
        ->create(); 
    }
}
