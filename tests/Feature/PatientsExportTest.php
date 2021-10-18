<?php

namespace Tests\Feature;

use App\Exports\PatientsExport;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class PatientsExportTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_export_patients_to_csv()
    {
        Excel::fake();

        $this->actingAs(User::factory()->create())
            ->get('/patients/export/csv');

        Excel::assertDownloaded('patients.csv', function(PatientsExport $export) {
            return true;
        });
    }
}
