<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\CourseController;

// Halaman Beranda (Landing Page)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Alur Pendaftaran Kursus (Pertemuan 9)
Route::get('/pendaftaran', [EnrollmentController::class, 'create'])->name('enrollment.create');
Route::post('/pendaftaran/preview', [EnrollmentController::class, 'preview'])->name('enrollment.preview');

// Endpoint JSON Availability Kursus via Ajax (Pertemuan 9)
Route::get('/courses/availability', [EnrollmentController::class, 'checkAvailability'])->name('courses.availability');
Route::get('/courses/{course_id}/availability', [EnrollmentController::class, 'checkAvailability'])->name('courses.availability.param');

// Manajemen Kursus - Resource Route Create & Read (Pertemuan 10)
Route::resource('courses', CourseController::class)->only(['index', 'create', 'store']);

// Evidence Praktikum Pertemuan Sebelumnya
Route::get('/evidence-week-07', function () {
    return view('evidence-week-07');
})->name('evidence.week07');
