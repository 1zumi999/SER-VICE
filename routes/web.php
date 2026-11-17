<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\DaftarServiceController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\PembayaranServiceController;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('home')
        : redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Data Pelanggan dan Kendaraan
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');

    // Daftar Service
    Route::get('/daftar-service', [DaftarServiceController::class, 'index'])->name('daftar-service.index');
    Route::get('/daftar-service/create', [DaftarServiceController::class, 'create'])->name('daftar-service.create');
    Route::post('/daftar-service', [DaftarServiceController::class, 'store'])->name('daftar-service.store');
    Route::get('/daftar-service/{id}', [DaftarServiceController::class, 'show'])->name('daftar-service.show');

    // Data Service
    Route::get('/data-service', [DataServiceController::class, 'index'])->name('data-service.index');
    Route::post('/data-service', [DataServiceController::class, 'store'])->name('data-service.store');
    Route::put('/data-service/{id}', [DataServiceController::class, 'update'])->name('data-service.update');

    // Pembayaran
    Route::get('/pembayaran', [PembayaranServiceController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran', [PembayaranServiceController::class, 'store'])->name('pembayaran.store');
});
