<?php

namespace App\Http\Livewire;

use App\Exports\PatientsExport;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PatientTable extends DataTableComponent
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public array $bulkActions = [
        'exportSelected' => 'Export',
    ];

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->searchable(),
            Column::make('First Name', 'first_name')
                ->sortable()
                ->searchable(),
            Column::make('Last Name', 'last_name')
                ->sortable()
                ->searchable(),
            Column::make('Sex')
                ->sortable(),
            Column::make('Birth Date', 'birth_date'),
            Column::make('Actions', 'id')
                ->format(function($value) {
                    return "<a href='".URL::route('patients.show', [$value])."'>View</a>";
                })
                ->asHtml(),
        ];
    }

    /**
     *
     */
    public function exportSelected()
    {
        if ($this->selectedRowsQuery()->count() > 0) {
            $ids = $this->selectedRowsQuery()->pluck('id');
            return (new PatientsExport($ids))->download(
                'Patients.csv',
                Excel::CSV,
                ['Content-Type' => 'text/csv']
            );
        }
    }

    public function query(): Builder
    {
        return Patient::query();
    }
}
