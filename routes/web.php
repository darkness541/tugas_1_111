<?php

use App\Http\Controllers\MakananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk CRUD Makanan
Route::resource('makanan', MakananController::class);
