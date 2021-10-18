<?php

use App\Exports\PatientsExport;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;
use \Maatwebsite\Excel\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/patients/{patient}', function (Patient $patient) {
    return view('show-patient', compact('patient'));
})->middleware(['auth'])->name('patients.show');

Route::get('/patients/export/csv', function () {
    return (new PatientsExport(Patient::pluck('id')))->download('patients.csv', Excel::CSV);
})->middleware(['auth'])->name('patients.export.csv');

require __DIR__.'/auth.php';
