<?php

namespace Tests\Feature;

use App\Http\Livewire\AddNewPatient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_add_a_new_patient_with_valid_input()
    {
        $this->actingAs(User::factory()->create());
        Livewire::test(AddNewPatient::class)
        $this->assertTrue(true);
    }

    public function test_users_can_not_add_a_new_patient_with_invalid_input()
    {
        $this->assertTrue(true);
    }
}
