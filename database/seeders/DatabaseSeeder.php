<?php

namespace Database\Seeders;

use App\Models\BloodPressureReading;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Only create the first user with email nurse@clinic.com
        if (!User::whereEmail('nurse@clinic.com')->first()){
            User::create([
                'name' => 'Test Nurse',
                'email' => 'nurse@clinic.com',
                'email_verified_at' => now(),
                'password' => bcrypt('Nurse@2021'), // password
                'remember_token' => Str::random(10),
            ]);
        }

       // \App\Models\User::factory(10)->create();

        Patient::factory(10)
            ->has(BloodPressureReading::factory()->count(1), 'bloodPressureReadings')
            ->create();
    }
}
