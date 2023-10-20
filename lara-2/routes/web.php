<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // chuyen huong den trang index duoi function cua doctorcontroll
    return redirect()->route('doctors.index');
});

Route::resource('/doctors', DoctorController::class);
Route::resource('/patients', PatientController::class);
