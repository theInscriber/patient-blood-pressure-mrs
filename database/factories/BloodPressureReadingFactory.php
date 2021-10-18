<?php

namespace Database\Factories;

use App\Models\BloodPressureReading;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class BloodPressureReadingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BloodPressureReading::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'systolic' => rand(110, 180),
            'diastolic' => rand(70, 120),
            'observation_note' => 'Note',
            'observation_datetime' => now(),
        ];
    }
}
