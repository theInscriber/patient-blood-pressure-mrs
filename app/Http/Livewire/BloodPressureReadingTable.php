<?php

namespace App\Http\Livewire;

use App\Models\BloodPressureReading;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class BloodPressureReadingTable extends DataTableComponent
{

    protected $listeners = ['refreshComponent' => '$refresh'];

    public int $patientId;

    public function columns(): array
    {
        return [
            Column::make('Datetime', 'observation_datetime')
                ->sortable(),
            Column::make('Systolic')
                ->sortable(),
            Column::make('Diastolic')
                ->sortable()
        ];
    }

    public function query(): Builder
    {
        return BloodPressureReading::query()->where('patient_id', $this->patientId);
    }
}
