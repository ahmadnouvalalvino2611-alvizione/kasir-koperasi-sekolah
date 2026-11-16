<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

Route::resource('produk', ProdukController::class)->except('show');
Route::resource('transaksi', TransaksiController::class)->except('show');
