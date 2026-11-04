<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    /**
     * Data kursus dan kuota ketersediaan kursi sementara (in-memory array).
     */
    protected array $courses = [
        'WEB-01' => [
            'id' => 'WEB-01',
            'name' => 'Web Dasar',
            'seats' => 12,
            'description' => 'Belajar HTML, CSS, dan dasar JavaScript modern.',
        ],
        'PHP-01' => [
            'id' => 'PHP-01',
            'name' => 'PHP Dasar',
            'seats' => 8,
            'description' => 'Mengenal sintaks, fungsi, percabangan, dan logika pemrograman PHP.',
        ],
        'LAR-01' => [
            'id' => 'LAR-01',
            'name' => 'Laravel Dasar',
            'seats' => 4,
            'description' => 'Belajar arsitektur MVC, routing, controller, Blade, dan ekosistem Laravel.',
        ],
    ];

    /**
     * Menampilkan halaman formulir pendaftaran kursus.
     */
    public function create(): View
    {
        return view('enrollment.create', [
            'courses' => $this->courses,
        ]);
    }

    /**
     * Memvalidasi data input pendaftaran dan menampilkan preview hasil pendaftaran.
     */
    public function preview(Request $request): View
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email'],
            'course_id' => ['required', 'string', 'in:' . implode(',', array_keys($this->courses))],
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'nama.min' => 'Nama minimal terdiri dari 3 karakter.',
            'nama.max' => 'Nama tidak boleh lebih dari 100 karakter.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid. Masukkan email yang benar.',
            'course_id.required' => 'Silakan pilih kursus yang diminati.',
            'course_id.in' => 'Kursus yang dipilih tidak valid dalam sistem kami.',
        ]);

        $selectedCourse = $this->courses[$validated['course_id']];

        return view('enrollment.preview', [
            'data' => $validated,
            'course' => $selectedCourse,
        ]);
    }

    /**
     * Endpoint API untuk mengambil ketersediaan kursi via Ajax (JSON).
     * Mendukung pemanggilan via query string (?course_id=...) maupun path parameter.
     */
    public function checkAvailability(Request $request, ?string $course_id = null): JsonResponse
    {
        $courseKey = $course_id ?? $request->query('course_id');

        if (!$courseKey || !isset($this->courses[$courseKey])) {
            return response()->json([
                'success' => false,
                'message' => 'Kursus tidak ditemukan.',
                'seats' => 0,
            ], 404);
        }

        $course = $this->courses[$courseKey];

        return response()->json([
            'success' => true,
            'course_id' => $course['id'],
            'course_name' => $course['name'],
            'seats' => $course['seats'],
            'message' => "Tersedia {$course['seats']} kursi untuk kursus {$course['name']}.",
        ]);
    }
}

