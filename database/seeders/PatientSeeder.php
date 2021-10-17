<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        # Chunk the results to run the seeding at Super Speeds otherwise it will take ages
        $patients = Patient::factory(50000)
                            ->make();
        foreach ($patients->chunk(2000) as $chunk)
        {
            Patient::insert($chunk->toArray());
        }
    }
}
