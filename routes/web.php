<?php

use App\Models\IsianRencanaSemester;
use App\Models\IsianRencanaSemester;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterMahasiswaController;
use App\Http\Controllers\DataIRSOlehMahasiswaController;
use App\Http\Controllers\DataKHSOlehMahasiswaController;
use App\Http\Controllers\DataPKLOlehMahasiswaController;
use App\Http\Controllers\LengkapiDataMahasiswaOlehMahasiswa;
use App\Http\Controllers\DataMahasiswaOlehOperatorController;

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

// Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'authenticate'])->name('login-proses');
});
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware(['auth', 'checkrole:operator'])->group(function () {
    Route::get('/tambah-mahasiswa', [DataMahasiswaOlehOperatorController::class, 'create'])->name('tambah-mahasiswa');
    Route::post('/tambah-mahasiswa', [DataMahasiswaOlehOperatorController::class, 'store'])->name('simpan-mahasiswa');
});


// Mahasiswa
Route::get('/isi-data/{nim}', [LengkapiDataMahasiswaOlehMahasiswa::class, 'edit'])->name('isi-data');
Route::put('/isi-data/{nim}', [LengkapiDataMahasiswaOlehMahasiswa::class, 'update']);

// IRS Mahasiswa
Route::get('/irs/{nim}', [DataIRSOlehMahasiswaController::class, 'index']);

Route::get('/irs/{nim}/{semester}/edit', [DataIRSOlehMahasiswaController::class, 'edit']);
Route::put('/irs/{nim}/{semester}', [DataIRSOlehMahasiswaController::class, 'update']);

Route::get('/irs/{nim}/{semester}', [DataIRSOlehMahasiswaController::class, 'show']);

// KHS Mahasiswa
Route::get('/khs/{nim}', [DataKHSOlehMahasiswaController::class, 'index']);

Route::get('/khs/{nim}/{semester}/edit', [DataKHSOlehMahasiswaController::class, 'edit']);
Route::put('/khs/{nim}/{semester}', [DataKHSOlehMahasiswaController::class, 'update']);

Route::get('/khs/{nim}/{semester}', [DataKHSOlehMahasiswaController::class, 'show']);

// Progres PKL
Route::get('/progres-pkl/{nim}', [DataPKLOlehMahasiswaController::class, 'show']);
Route::get('/progres-pkl/{nim}/edit', [DataPKLOlehMahasiswaController::class, 'edit']);
Route::put('/progres-pkl/{nim}', [DataPKLOlehMahasiswaController::class, 'update']);

Route::get('/khs/{nim}/{semester}', [DataKHSOlehMahasiswaController::class, 'show']);
