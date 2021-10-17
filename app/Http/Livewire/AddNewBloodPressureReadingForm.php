<?php

namespace App\Http\Livewire;

use App\Models\BloodPressureReading;
use Livewire\Component;

class AddNewBloodPressureReadingForm extends Component
{
    public bool $showForm = false;
    public $patientId;

    public $systolic;
    public $diastolic;
    public $observationNote;
    public $observationDatetime;

    public array $rules = [
        'systolic' => 'required|numeric|between:110,180',
        'diastolic' => 'required|numeric|between:70,120',
        'observationNote' => 'required|nullable|string|max:500',
        'observationDatetime' => 'required|date|before:tomorrow',
    ];

    public function submit()
    {
        $data = $this->validate();
        $reading = new BloodPressureReading;
        $reading->forceFill([
            'systolic' => $data['systolic'],
            'diastolic' => $data['diastolic'],
            'observation_note' => $data['observationNote'],
            'observation_datetime' => $data['observationDatetime'],
            'patient_id' => $this->patientId,
        ])->save();

        $this->cancelForm();
    }

    public function cancelForm()
    {
        $this->reset();
        $this->dispatchBrowserEvent('form-canceled');
    }

    public function render()
    {
        return view('livewire.add-new-blood-pressure-reading-form');
    }
}
