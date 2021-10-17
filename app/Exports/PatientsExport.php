<?php

namespace App\Exports;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class PatientsExport implements FromQuery
{
    use Exportable;

    private Collection $ids;

    public function __construct(Collection $ids)
    {
        $this->ids = $ids;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Patient::query()->whereIn('id', $this->ids);
    }
}
