<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMahasiswaOlehOperatorController;
use App\Http\Controllers\RegisterMahasiswaController;
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
    return view('home');
});

// Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterMahasiswaController::class, 'index']);
    Route::post('/cek-nim', [RegisterMahasiswaController::class, 'cekNIM']);
    Route::get('/isi-data', [RegisterMahasiswaController::class, 'edit'])->name('isi-data');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware(['auth', 'checkrole:operator'])->group(function () {
    Route::get('/tambah-mahasiswa', [DataMahasiswaOlehOperatorController::class, 'create'])->name('tambah-mahasiswa');
    Route::post('/tambah-mahasiswa', [DataMahasiswaOlehOperatorController::class, 'store'])->name('simpan-mahasiswa');
});
