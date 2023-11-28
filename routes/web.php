<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\DataIRSOlehMahasiswaController;
use App\Http\Controllers\DataKHSOlehMahasiswaController;
use App\Http\Controllers\DataPKLOlehMahasiswaController;
use App\Http\Controllers\SetujuiIRSOlehDosenWaliController;
use App\Http\Controllers\SetujuiKHSOlehDosenWaliController;
use App\Http\Controllers\SetujuiPKLOlehDosenWaliController;
use App\Http\Controllers\DataSkripsiOlehMahasiswaController;
use App\Http\Controllers\LengkapiDataMahasiswaOlehMahasiswa;
use App\Http\Controllers\DataMahasiswaOlehOperatorController;
use App\Http\Controllers\DataMahasiswaOlehDosenWaliController;
use App\Http\Controllers\SetujuiSkripsiOlehDosenWaliController;

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
    return view('home');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'authenticate'])->name('login-proses');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::middleware(['checkrole:operator'])->group(function () {
        Route::get('/tambah-mahasiswa', [DataMahasiswaOlehOperatorController::class, 'create'])->name('tambah-mahasiswa');
        Route::post('/tambah-mahasiswa', [DataMahasiswaOlehOperatorController::class, 'store'])->name('simpan-mahasiswa');

        Route::get('/search-mahasiswa', [DataMahasiswaOlehOperatorController::class, 'searchMahasiswa']);

        Route::prefix('operator')->group(function () {
            Route::get('/ubah-status-mahasiswa', [DataMahasiswaOlehOperatorController::class, 'showAllMahasiswa']);
            Route::put('/update-status-mahasiswa', [DataMahasiswaOlehOperatorController::class, 'updateStatusMahasiswa']);
        });
    });

    Route::middleware(['checkrole:mahasiswa'])->group(function () {
        // Mahasiswa
        Route::get('/kabupaten', [KabupatenController::class, 'index']);
        Route::get('/isi-data/{nim}', [LengkapiDataMahasiswaOlehMahasiswa::class, 'edit'])->name('isi-data');
        Route::put('/isi-data/{nim}', [LengkapiDataMahasiswaOlehMahasiswa::class, 'update']);

        // IRS Mahasiswa
        Route::prefix('mahasiswa')->group(function () {
            // IRS
            Route::get('/irs/{nim}', [DataIRSOlehMahasiswaController::class, 'index'])->name('mahasiswa.irs.index');
            Route::get('/irs/{nim}/{semester}', [DataIRSOlehMahasiswaController::class, 'show']);
            Route::get('/irs/{nim}/{semester}/edit', [DataIRSOlehMahasiswaController::class, 'edit']);
            Route::put('/irs/{nim}/{semester}', [DataIRSOlehMahasiswaController::class, 'update']);

            // KHS Mahasiswa
            Route::get('/khs/{nim}', [DataKHSOlehMahasiswaController::class, 'index']);
            Route::get('/khs/{nim}/{semester}', [DataKHSOlehMahasiswaController::class, 'show']);
            Route::get('/khs/{nim}/{semester}/edit', [DataKHSOlehMahasiswaController::class, 'edit']);
            Route::put('/khs/{nim}/{semester}', [DataKHSOlehMahasiswaController::class, 'update']);

            // Progres PKL
            Route::get('/progres-pkl/{nim}', [DataPKLOlehMahasiswaController::class, 'show']);
            Route::get('/progres-pkl/{nim}/edit', [DataPKLOlehMahasiswaController::class, 'edit']);
            Route::put('/progres-pkl/{nim}', [DataPKLOlehMahasiswaController::class, 'update']);

            // Progres Skripsi
            Route::get('/progres-skripsi/{nim}', [DataSkripsiOlehMahasiswaController::class, 'show']);
            Route::get('/progres-skripsi/{nim}/edit', [DataSkripsiOlehMahasiswaController::class, 'edit']);
            Route::put('/progres-skripsi/{nim}', [DataSkripsiOlehMahasiswaController::class, 'update']);
        });
    });

    Route::middleware(['checkrole:dosenWali'])->group(function () {
        Route::prefix('dosen-wali')->group(function () {
            Route::get('/search-mahasiswa', [DataMahasiswaOlehDosenWaliController::class, 'searchMahasiswa']);

            // Lihat mahasiswa
            Route::get('/daftar-mahasiswa', [DataMahasiswaOlehDosenWaliController::class, 'index']);
            Route::get('/detail-mahasiswa/{nim}', [DataMahasiswaOlehDosenWaliController::class, 'show']);

            // Lihat IRS yang belum disetujui
            Route::get('/setujui-irs', [SetujuiIRSOlehDosenWaliController::class, 'indexMahasiswa']);
            Route::get('/setujui-khs', [SetujuiKHSOlehDosenWaliController::class, 'indexMahasiswa']);
            Route::get('/setujui-pkl', [SetujuiPKLOlehDosenWaliController::class, 'indexMahasiswa']);
            Route::get('/setujui-skripsi', [SetujuiSkripsiOlehDosenWaliController::class, 'indexMahasiswa']);

            // Lihat IRS per mahasiswa
            Route::get('/irs/{nim}', [SetujuiIRSOlehDosenWaliController::class, 'indexIRS']);
            Route::get('/irs/{nim}/{semester}/setujui', [SetujuiIRSOlehDosenWaliController::class, 'confirmSetujui']);
            Route::get('/irs/{nim}/{semester}/edit', [SetujuiIRSOlehDosenWaliController::class, 'editDanSetujui']);
            Route::put('/irs/{nim}/{semester}/update-dan-setujui', [SetujuiIRSOlehDosenWaliController::class, 'updateDanSetujui']);
            Route::put('/irs/{nim}/{semester}', [SetujuiIRSOlehDosenWaliController::class, 'setujui']);

            // Lihat KHS per mahasiswa
            Route::get('/khs/{nim}', [SetujuiKHSOlehDosenWaliController::class, 'index']);
            Route::get('/khs/{nim}/{semester}/setujui', [SetujuiKHSOlehDosenWaliController::class, 'confirmSetujui']);
            Route::get('/khs/{nim}/{semester}/edit', [SetujuiKHSOlehDosenWaliController::class, 'editDanSetujui']);
            Route::put('/khs/{nim}/{semester}/update-dan-setujui', [SetujuiKHSOlehDosenWaliController::class, 'updateDanSetujui']);
            Route::put('/khs/{nim}/{semester}', [SetujuiKHSOlehDosenWaliController::class, 'setujui']);

            // Lihat PKL mahasiswa
            Route::get('/progres-pkl/{nim}/setujui', [SetujuiPKLOlehDosenWaliController::class, 'confirmSetujui']);
            Route::get('/progres-pkl/{nim}/edit', [SetujuiPKLOlehDosenWaliController::class, 'editDanSetujui']);
            Route::put('/progres-pkl/{nim}/update-dan-setujui', [SetujuiPKLOlehDosenWaliController::class, 'updateDanSetujui']);
            Route::put('/progres-pkl/{nim}', [SetujuiPKLOlehDosenWaliController::class, 'setujui']);

            // Lihat Skripsi mahasiswa
            Route::get('/progres-skripsi/{nim}/setujui', [SetujuiSkripsiOlehDosenWaliController::class, 'confirmSetujui']);
            Route::get('/progres-skripsi/{nim}/edit', [SetujuiSkripsiOlehDosenWaliController::class, 'editDanSetujui']);
            Route::put('/progres-skripsi/{nim}/update-dan-setujui', [SetujuiSkripsiOlehDosenWaliController::class, 'updateDanSetujui']);
            Route::put('/progres-skripsi/{nim}', [SetujuiSkripsiOlehDosenWaliController::class, 'setujui']);
        });
    });
});
