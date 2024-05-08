<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\TerapisController;
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

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('store-pesanan', [HomeController::class, 'storePesanan'])->name('store.pesanan');
Route::post('store-nilai-kriteria', [HomeController::class, 'storeNilaiKriteria'])->name('store.nilai.kriteria');

Route::post('rekomendasi/predict', [RekomendasiController::class, 'predict'])->name('rekomendasi.predict');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('pelanggan')->group(function () {
        Route::get('/', [PelangganController::class, 'index'])->name('pelanggan.index');
        Route::get('create', [PelangganController::class, 'create'])->name('pelanggan.create');
        Route::post('store', [PelangganController::class, 'store'])->name('pelanggan.store');
        Route::get('edit/{user}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
        Route::patch('update/{user}', [PelangganController::class, 'update'])->name('pelanggan.update');
        Route::delete('delete/{user}', [PelangganController::class, 'destroy'])->name('pelanggan.delete');
    });

    Route::prefix('terapis')->group(function () {
        Route::get('/', [TerapisController::class, 'index'])->name('terapis.index');
        Route::get('create', [TerapisController::class, 'create'])->name('terapis.create');
        Route::post('store', [TerapisController::class, 'store'])->name('terapis.store');
        Route::get('edit/{terapis}', [TerapisController::class, 'edit'])->name('terapis.edit');
        Route::patch('update/{terapis}', [TerapisController::class, 'update'])->name('terapis.update');
        Route::delete('delete/{terapis}', [TerapisController::class, 'destroy'])->name('terapis.delete');
    });

    Route::prefix('pesanan')->group(function () {
        Route::get('/', [PesananController::class, 'index'])->name('pesanan.index');
        Route::get('create', [PesananController::class, 'create'])->name('pesanan.create');
        Route::post('store', [PesananController::class, 'store'])->name('pesanan.store');
        Route::get('edit/{pesanan}', [PesananController::class, 'edit'])->name('pesanan.edit');
        Route::patch('update/{pesanan}', [PesananController::class, 'update'])->name('pesanan.update');
        Route::delete('delete/{pesanan}', [PesananController::class, 'destroy'])->name('pesanan.delete');
    });

    Route::prefix('alternatif')->group(function () {
        Route::get('/', [AlternatifController::class, 'index'])->name('alternatif.index');
        Route::get('create', [AlternatifController::class, 'create'])->name('alternatif.create');
        Route::post('store', [AlternatifController::class, 'store'])->name('alternatif.store');
        Route::get('edit/{alternatif}', [AlternatifController::class, 'edit'])->name('alternatif.edit');
        Route::patch('update/{alternatif}', [AlternatifController::class, 'update'])->name('alternatif.update');
        Route::delete('delete/{alternatif}', [AlternatifController::class, 'destroy'])->name('alternatif.delete');
    });

    Route::prefix('kriteria')->group(function () {
        Route::get('/', [KriteriaController::class, 'index'])->name('kriteria.index');
        Route::get('create', [KriteriaController::class, 'create'])->name('kriteria.create');
        Route::post('store', [KriteriaController::class, 'store'])->name('kriteria.store');
        Route::get('edit/{kriteria}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
        Route::patch('update/{kriteria}', [KriteriaController::class, 'update'])->name('kriteria.update');
        Route::delete('delete/{kriteria}', [KriteriaController::class, 'destroy'])->name('kriteria.delete');
    });
});
