<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PindahKeluarController;
use App\Http\Controllers\PindahMasukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UbahKerjaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('pages.register');
});

// Route penelitian
Route::get('/permintaan', [PermintaanController::class, 'index']);

// Route Warga
Route::prefix('warga')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/pindah-masuk', [PindahMasukController::class, 'index']);
    Route::get('/pindah-keluar', [PindahKeluarController::class, 'index']);
    Route::get('/detail-pindah-masuk', function () {
        return view('pages.detailPengajuanSurat.detailPengajuanPindahMasuk');
    });
    Route::get('/detail-pindah-keluar', function () {
        return view('pages.detailPengajuanSurat.detailPengajuanPindahKeluar');
    });
    Route::get('/detail-ubah-pekerjaan', function () {
        return view('pages.detailPengajuanSurat.detailPengajuanPekerjaan');
    });
    Route::get('/form-tambah-data', [PindahMasukController::class, 'tambahData']);
    Route::get('/form-pindah-keluar', [PindahKeluarController::class, 'form']);
    Route::get('/form-kk-baru', function () {
        return view('pages.pengajuanKK');
    });

    // Route Ubah Pekerjaan
    Route::get('/ubah-pekerjaan', [UbahKerjaController::class, 'index']);
    Route::get('/form-pekerjaan/{id}', [UbahKerjaController::class, 'show']);
    Route::put('/form-pekerjaan/{id}', [UbahKerjaController::class, 'update'])->name('form-pekerjaan');
});
