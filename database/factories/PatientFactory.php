<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sex = collect(['Male', 'Female'])->random();
        return [
            'first_name' => $this->faker->firstName($sex),
            'last_name' => $this->faker->lastName(),
            'sex' => $sex,
            'birth_date' => $this->faker->dateTimeThisCentury('now'),
            'address' => $this->faker->address,
        ];
    }
}
