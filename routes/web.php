<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterMahasiswaController;
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
    Route::get('/isi-data/{nim}', [LengkapiDataMahasiswaOlehMahasiswa::class, 'edit'])->name('isi-data');
    Route::put('/isi-data/{nim}', [LengkapiDataMahasiswaOlehMahasiswa::class, 'update']);

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'authenticate'])->name('login-proses');
});
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware(['auth', 'checkrole:operator'])->group(function () {
    Route::get('/tambah-mahasiswa', [DataMahasiswaOlehOperatorController::class, 'create'])->name('tambah-mahasiswa');
    Route::post('/tambah-mahasiswa', [DataMahasiswaOlehOperatorController::class, 'store'])->name('simpan-mahasiswa');
});
