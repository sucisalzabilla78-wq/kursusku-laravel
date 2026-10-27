<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/evidence-week-07', function () {
    return view('evidence-week-07');
})->name('evidence.week07');