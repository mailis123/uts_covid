<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
# Menampilkan semua data
Route::get("/patient", [PatientController::class, 'index']);
# menampilkan per id
Route::get('/patient/{id}', [PatientController::class, 'show']);
# mengedit sebuah data
Route::put('/patient/{id}', [PatientController::class, 'update']);
# menghapus sebuah data
Route::delete('/patient/{id}', [PatientController::class, 'delete']);
# Menambahkan sebuah data
Route::post('/patient', [PatientController::class, 'store']);
# mencari berdasarkan status pasien positif
Route::get('/patient/status/positive', [PatientController::class, 'positive']);
# Mencarti Berdasarkan status pasien negatif
Route::get('/patient/status/negatif', [PatientController::class, 'negatif']);
