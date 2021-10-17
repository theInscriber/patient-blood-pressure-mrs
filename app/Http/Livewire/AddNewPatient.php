<?php

namespace App\Http\Livewire;

use App\Models\BloodPressureReading;
use App\Models\Patient;
use Carbon\Carbon;
use Livewire\Component;

class AddNewPatient extends Component
{
    public bool $showForm = false;
    public $firstName;
    public $lastName;
    public $sex;
    public $birthDate;
    public $address;

    public array $rules = [
        'firstName' => 'required|string|max:50',
        'lastName' => 'required|string|max:50',
        'sex' => 'required|string|in:Male,Female',
        'birthDate' => 'required|date|before:today',
        'address' => 'required|string|max:150',
    ];

    public function submit()
    {
        $data = $this->validate();
        $patient = new Patient;
        $patient->forceFill([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'sex' => $data['sex'],
            'birth_date' => Carbon::parse($data['birthDate'])->toDate(),
            'address' => $data['address']
        ])->save();

        $this->cancelForm();
        $this->emitTo('patient-table', 'refreshComponent');
    }

    public function cancelForm()
    {
        $this->reset();
        $this->dispatchBrowserEvent('form-canceled');
    }

    public function render()
    {
        return view('livewire.add-new-patient-form');
    }
}
