<?php

namespace Tests\Feature;

use App\Http\Livewire\AddNewBloodPressureReadingForm;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class BloodPressureReadingTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_add_a_new_blood_pressure_reading_with_valid_input()
    {
        $patient = Patient::factory()->create();

        Livewire::test(AddNewBloodPressureReadingForm::class)
            ->set('systolic', 150)
            ->set('diastolic', 80)
            ->set('observationDatetime', now())
            ->set('observationNote', 'Note')
            ->set('patientId', $patient->id)
            ->call('submit');

        $this->assertTrue(
            $patient->bloodPressureReadings()
                ->where('systolic' ,150)
                ->where('diastolic',80)
                ->exists()
        );
    }

    public function test_users_can_not_add_a_new_patient_with_invalid_input()
    {
        $patient = Patient::factory()->create();

        Livewire::test(AddNewBloodPressureReadingForm::class)
            ->set('systolic', 200)
            ->set('diastolic', 80)
            ->set('observationDatetime', now())
            ->set('observationNote', 'Note')
            ->set('patientId', $patient->id)
            ->call('submit')
            ->assertHasErrors();
    }
}
