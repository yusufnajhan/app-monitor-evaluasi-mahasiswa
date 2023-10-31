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
    return view('landing-page');
})->name('landing-page');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterMahasiswaController::class, 'index']);
    Route::get('/cek-nim', [RegisterMahasiswaController::class, 'cekNIM']);
    Route::get('/lengkapi-data/{nim}', [RegisterMahasiswaController::class, 'edit'])->name('lengkapi-data');
    Route::put('/lengkapi-data/{nim}', [RegisterMahasiswaController::class, 'update']);

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware(['auth', 'checkrole:operator'])->group(function () {
    Route::get('/tambah-mahasiswa', [DataMahasiswaOlehOperatorController::class, 'create'])->name('tambah-mahasiswa');
    Route::post('/tambah-mahasiswa', [DataMahasiswaOlehOperatorController::class, 'store'])->name('simpan-mahasiswa');
});
