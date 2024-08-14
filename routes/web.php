<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermintaanController;
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
Route::get('/tambahData', function () {
    return view('pages.tambahData');
});
Route::get('/pengajuan-pekerjaan', function () {
    return view('pages.pengajuanPekerjaan');
});
Route::get('/pengajuan-permohonan', function () {
    return view('pages.pengajuanPermohonan');
});
Route::get('/pengajuan-kk', function () {
    return view('pages.pengajuanKK');
});
Route::get('/detail-pekerjaan', function () {
    return view('pages.detailPengajuanSurat.detailPengajuanPekerjaan');
});
Route::get('/detail-pindah-keluar', function () {
    return view('pages.detailPengajuanSurat.detailPengajuanPindahKeluar');
});
Route::get('/detail-pindah-masuk', function () {
    return view('pages.detailPengajuanSurat.detailPengajuanPindahMasuk');
});

// lists penelitian
Route::get('/permintaan', [PermintaanController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
