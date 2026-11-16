<?php

<<<<<<< HEAD
use App\Http\Controllers\KategoriController;
=======
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
Route::redirect('/', '/dashboard');
=======
Route::get('/', function () {
    return view('welcome');
});

Route::resource('pelanggan', PelangganController::class);
Route::resource('produk', ProdukController::class)->except('show');
Route::resource('transaksi', TransaksiController::class)->except('show');
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7

Route::get('/dashboard', function () {
    return view('Dashboard.index');
})->name('dashboard');
<<<<<<< HEAD

Route::resource('pelanggan', PelangganController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('produk', ProdukController::class)->except('show');
Route::resource('transaksi', TransaksiController::class)->except('show');
=======
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7
