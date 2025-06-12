<?php

use App\Http\Controllers\Auth\DokterLoginController;
use App\Http\Controllers\Auth\PasienLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Utama (Welcome)
Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman login dokter (login-dokter)
Route::get('login-dokter', [DokterLoginController::class, 'showLoginForm'])->name('dokter.login.form');
Route::post('login-dokter', [DokterLoginController::class, 'login'])->name('dokter.login');

// Route untuk halaman login pasien (login-pasien)
Route::get('login-pasien', [PasienLoginController::class, 'showLoginForm'])->name('pasien.login.form');
Route::post('login-pasien', [PasienLoginController::class, 'login'])->name('pasien.login');

// Route untuk halaman dashboard admin
Route::middleware(['auth'])->get('/admin/dashboard', function () {
    return view('admin.index'); // Pastikan sudah ada file 'admin/index.blade.php'
})->name('dashboard');  // Nama route untuk dashboard admin

// Route untuk halaman dashboard pasien
Route::middleware(['auth:pasien'])->get('/pasien/dashboard', function () {
    return view('pasien.index'); // Pastikan sudah ada file 'pasien/index.blade.php'
})->name('pasien.index');  // Nama route untuk dashboard pasien

// Route untuk halaman dashboard dokter
Route::middleware(['auth:dokter'])->get('/dokter/dashboard', function () {
    return view('dokter.index'); // Pastikan sudah ada file 'dokter/index.blade.php'
})->name('dokter.index');  // Nama route untuk dashboard dokter

// Route Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Laravel Auth routes seperti login, register, logout
require __DIR__.'/auth.php';