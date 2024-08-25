<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PindahKeluarController;
use App\Http\Controllers\PindahMasukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UbahKerjaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UbahKerjaController as AdminKerjaController;
use App\Http\Controllers\Admin\PindahMasukController as AdminMasukController;
use App\Http\Controllers\Admin\PindahKeluarController as AdminKeluarController;

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

Route::get('/402', function () {
    return view('pages.error.unauthorized');
});

// Route penelitian
Route::prefix('/rt')->middleware(['auth.custom', 'role:rt'])->group(function () {
    Route::get('/ubah-kerja', [AdminKerjaController::class, 'rt'])->name('rt.ubahKerja');
    Route::get('/detail-ubah-kerja/{id}', [AdminKerjaController::class, 'show'])->name('rt.detailUbahKerja');
    Route::post('/detail-ubah-kerja/{id}', [AdminKerjaController::class, 'storeRt'])->name('rt.submitUbahKerja');
    Route::get('/pindah-masuk', [AdminMasukController::class, 'rt'])->name('rt.pindahMasuk');
    Route::get('/detail-pindah-masuk/{id}', [AdminMasukController::class, 'show'])->name('rt.detailPindahMasuk');
    Route::post('/detail-pindah-masuk/{id}', [AdminMasukController::class, 'storeRt'])->name('rt.submitPindahMasuk');
    Route::get('/pindah-keluar', [AdminKeluarController::class, 'rt'])->name('rt.pindahKeluar');
    Route::get('/detail-pindah-keluar/{id}', [AdminKeluarController::class, 'show'])->name('rt.detailPindahKeluar');
    Route::post('/detail-pindah-keluar/{id}', [AdminKeluarController::class, 'storeRt'])->name('rt.submitPindahKeluar');
});
Route::prefix('/rw')->middleware(['auth.custom', 'role:rw'])->group(function () {
    Route::get('/ubah-kerja', [AdminKerjaController::class, 'rw'])->name('rw.ubahKerja');
    Route::get('/detail-ubah-kerja/{id}', [AdminKerjaController::class, 'show'])->name('rw.detailUbahKerja');
    Route::post('/detail-ubah-kerja/{id}', [AdminKerjaController::class, 'storeRw'])->name('rw.submitUbahKerja');
    Route::get('/pindah-masuk', [AdminMasukController::class, 'rw'])->name('rw.pindahMasuk');
    Route::get('/detail-pindah-masuk/{id}', [AdminMasukController::class, 'show'])->name('rw.detailPindahMasuk');
    Route::post('/detail-pindah-masuk/{id}', [AdminMasukController::class, 'storeRw'])->name('rw.submitPindahMasuk');
    Route::get('/pindah-keluar', [AdminKeluarController::class, 'rw'])->name('rw.pindahKeluar');
    Route::get('/detail-pindah-keluar/{id}', [AdminKeluarController::class, 'show'])->name('rw.detailPindahKeluar');
    Route::post('/detail-pindah-keluar/{id}', [AdminKeluarController::class, 'storeRw'])->name('rw.submitPindahKeluar');
});
Route::prefix('/kelurahan')->middleware(['auth.custom', 'role:kelurahan'])->group(function () {
    Route::get('/ubah-kerja', [AdminKerjaController::class, 'kelurahan'])->name('kelurahan.ubahKerja');
    Route::get('/detail-ubah-kerja/{id}', [AdminKerjaController::class, 'show'])->name('kelurahan.detailUbahKerja');
    Route::post('/detail-ubah-kerja/{id}', [AdminKerjaController::class, 'storeKel'])->name('kelurahan.submitUbahKerja');
    Route::get('/pindah-masuk', [AdminMasukController::class, 'kelurahan'])->name('kelurahan.pindahMasuk');
    Route::get('/detail-pindah-masuk/{id}', [AdminMasukController::class, 'show'])->name('kelurahan.detailPindahMasuk');
    Route::post('/detail-pindah-masuk/{id}', [AdminMasukController::class, 'storeKel'])->name('kelurahan.submitPindahMasuk');
    Route::get('/pindah-keluar', [AdminKeluarController::class, 'kelurahan'])->name('kelurahan.pindahKeluar');
    Route::get('/detail-pindah-keluar/{id}', [AdminKeluarController::class, 'show'])->name('kelurahan.detailPindahKeluar');
    Route::post('/detail-pindah-keluar/{id}', [AdminKeluarController::class, 'storeKel'])->name('kelurahan.submitPindahKeluar');
});
Route::prefix('/kecamatan')->middleware(['auth.custom', 'role:kecamatan'])->group(function () {
    Route::get('/ubah-kerja', [AdminKerjaController::class, 'kecamatan'])->name('kecamatan.ubahKerja');
    Route::get('/detail-ubah-kerja/{id}', [AdminKerjaController::class, 'show'])->name('kecamatan.detailUbahKerja');
    Route::post('/detail-ubah-kerja/{id}', [AdminKerjaController::class, 'storeKec'])->name('kecamatan.submitUbahKerja');
    Route::get('/pindah-masuk', [AdminMasukController::class, 'kecamatan'])->name('kecamatan.pindahMasuk');
    Route::get('/detail-pindah-masuk/{id}', [AdminMasukController::class, 'show'])->name('kecamatan.detailPindahMasuk');
    Route::post('/detail-pindah-masuk/{id}', [AdminMasukController::class, 'storeKec'])->name('kecamatan.submitPindahMasuk');
    Route::get('/pindah-keluar', [AdminKeluarController::class, 'kecamatan'])->name('kecamatan.pindahKeluar');
    Route::get('/detail-pindah-keluar/{id}', [AdminKeluarController::class, 'show'])->name('kecamatan.detailPindahKeluar');
    Route::post('/detail-pindah-keluar/{id}', [AdminKeluarController::class, 'storeKec'])->name('kecamatan.submitPindahKeluar');
});

// Route Warga
Route::prefix('warga')->middleware(['auth.custom', 'role:warga'])->group(function () {
    Route::get('/dashboard/{id}', [DashboardController::class, 'index']);

    // Route Pindah Masuk
    Route::get('/datadiri/pindahMasuk', [PindahMasukController::class, 'getData'])->name('data-diri.pindahMasuk');
    Route::get('/pindah-masuk/{id}', [PindahMasukController::class, 'index']);
    Route::get('/form-tambah-data/{id}', [PindahMasukController::class, 'show'])->name('form-tambah-data.show');
    Route::put('/form-tambah-data/update/{id}', [PindahMasukController::class, 'update'])->name('form.tambah.data.update');
    Route::get('/form-kk-baru/{id}', [PindahMasukController::class, 'showKK']);
    Route::post('/form-kk-baru/create/{id}', [PindahMasukController::class, 'store'])->name('form.kk.baru.create');
    Route::get('/detail/{jenis}/{id}', [PindahMasukController::class, 'getDetail'])->name('getDetail');
    // Route::get('/detail-pindah-masuk/{id}', [PindahMasukController::class, 'detail'])->name('');

    // Route Pindah Keluar
    Route::get('/datadiri/pindahKeluar', [PindahKeluarController::class, 'getData'])->name('data-diri.pindahKeluar');
    Route::get('/pindah-keluar/{id}', [PindahKeluarController::class, 'index']);
    Route::get('/form-pindah-keluar/{id}', [PindahKeluarController::class, 'show']);
    Route::put('/form-pindah-keluar/{id}', [PindahKeluarController::class, 'update'])->name('form-pindah-keluar');
    Route::get('/detail-pindah-keluar/{id}', []);

    // Route Ubah Pekerjaan
    Route::get('/datadiri/getData', [UbahKerjaController::class, 'getData'])->name('data-diri.getData');
    Route::get('/ubah-pekerjaan/{id}', [UbahKerjaController::class, 'index']);
    Route::get('/form-pekerjaan/{id}', [UbahKerjaController::class, 'show']);
    Route::put('/form-pekerjaan/{id}', [UbahKerjaController::class, 'update'])->name('form-pekerjaan');
    Route::get('/detail-ubah-pekerjaan/{id}', []);

    // Route Detail Pengajuan
    Route::get('/detail-pindah-masuk', function () {
        return view('pages.detailPengajuanSurat.detailPengajuanPindahMasuk');
    });
    Route::get('/detail-pindah-keluar', function () {
        return view('pages.detailPengajuanSurat.detailPengajuanPindahKeluar');
    });
    Route::get('/detail-ubah-pekerjaan', function () {
        return view('pages.detailPengajuanSurat.detailPengajuanPekerjaan');
    });
});
