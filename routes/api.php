<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PelangganApiController;
use App\Http\Controllers\Api\KendaraanApiController;
use App\Http\Controllers\Api\DaftarServiceApiController;
use App\Http\Controllers\Api\DataServiceApiController;
use App\Http\Controllers\Api\PembayaranServiceApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API PELANGGAN
Route::apiResource('pelanggan', PelangganApiController::class);

// API KENDARAAN
Route::apiResource('kendaraan', KendaraanApiController::class);

// API DAFTAR SERVICE
Route::apiResource('daftar-service', DaftarServiceApiController::class);

// API DATA SERVICE
Route::apiResource('data-service', DataServiceApiController::class);

// API PEMBAYARAN
Route::apiResource('pembayaran', PembayaranServiceApiController::class);
