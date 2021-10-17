<?php

namespace Database\Seeders;

use App\Models\BloodPressureReading;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class BloodPressureReadingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        # Chunk the results to run the seeding at Super Speeds otherwise it will take ages
        Patient::chunk(2000, function ($patients){
           $bloodPressureReadings =  $patients->map(function ($patient){
                return [
                    'systolic' => rand(110, 180),
                    'diastolic' => rand(70, 120),
                    'observation_note' => null,
                    'observation_datetime' => now(),
                    'patient_id' => $patient->id
                ];
            });
           BloodPressureReading::insert($bloodPressureReadings->toArray());
        });
    }
}
