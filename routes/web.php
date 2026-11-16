<?php

use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pelanggan', PelangganController::class);

Route::get('/dashboard', function () {
    return view('Dashboard.index');
})->name('dashboard');