<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pelanggan', PelangganController::class);
Route::resource('produk', ProdukController::class)->except('show');
Route::resource('transaksi', TransaksiController::class)->except('show');

Route::get('/dashboard', function () {
    return view('Dashboard.index');
})->name('dashboard');
