<?php

namespace Tests\Feature;

use App\Http\Livewire\AddNewPatientForm;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_add_a_new_patient_with_valid_input()
    {
        Livewire::test(AddNewPatientForm::class)
            ->set('firstName', 'Samuel')
            ->set('lastName', 'Yute')
            ->set('sex', 'Male')
            ->set('birthDate', '01-01-2021')
            ->set('address', 'Address')
            ->call('submit');

        $this->assertTrue(Patient::where('first_name', 'Samuel')->where('last_name', 'Yute')->exists());
    }

    public function test_users_can_not_add_a_new_patient_with_invalid_input()
    {
        Livewire::test(AddNewPatientForm::class)
            ->set('sex', 'Other')
            ->set('birthDate', '01-01-2022')
            ->set('address', 'Address')
            ->call('submit')
            ->assertHasErrors([
                'firstName' => 'required',
                'lastName' => 'required',
            ]);;
    }
}
