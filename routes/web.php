<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::get('/dashboard', function () {
    return view('Dashboard.index');
})->name('dashboard');

Route::resource('pelanggan', PelangganController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('produk', ProdukController::class)->except('show');
Route::resource('transaksi', TransaksiController::class)->except('show');
