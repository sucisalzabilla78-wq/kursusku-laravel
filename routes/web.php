<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollment.index');
Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollment.create');
Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollment.store');