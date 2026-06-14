<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk Kategori (Model 1)
Route::resource('kategori', KategoriController::class);

// Route untuk Makanan (Model 2) - sementara
Route::resource('makanan', MakananController::class);