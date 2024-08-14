<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PindahMasukController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/login', function () {
    return view('pages.login');
});
Route::get('/pengajuan', function () {
    return view('pages.pengajuan');
});

// lists penelitian
Route::get('/permintaan', [PermintaanController::class, 'index']);

// Route Warga
Route::get('/warga/dashboard', [DashboardController::class, 'index']);
Route::get('/warga/pindah-masuk', [PindahMasukController::class, 'index']);
