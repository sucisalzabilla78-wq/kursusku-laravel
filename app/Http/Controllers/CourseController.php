<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Menampilkan daftar kursus dari database.
     */
    public function index(): View
    {
        $courses = Course::orderBy('created_at', 'desc')->paginate(10);

        return view('courses.index', compact('courses'));
    }

    /**
     * Menampilkan formulir penambahan kursus baru.
     */
    public function create(): View
    {
        return view('courses.create');
    }

    /**
     * Memvalidasi dan menyimpan data kursus baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:20', 'unique:courses,code'],
            'name' => ['required', 'string', 'min:3', 'max:120'],
            'description' => ['nullable', 'string'],
            'fee' => ['required', 'numeric', 'min:0'],
            'quota' => ['required', 'integer', 'min:1'],
            'start_date' => ['required', 'date'],
            'status' => ['required', 'in:draft,open,closed'],
        ], [
            'code.required' => 'Kode kursus wajib diisi.',
            'code.max' => 'Kode kursus maksimal 20 karakter.',
            'code.unique' => 'Kode kursus ini sudah terdaftar. Silakan gunakan kode lain.',
            'name.required' => 'Nama kursus wajib diisi.',
            'name.min' => 'Nama kursus minimal 3 karakter.',
            'name.max' => 'Nama kursus maksimal 120 karakter.',
            'fee.required' => 'Biaya kursus wajib diisi.',
            'fee.numeric' => 'Biaya kursus harus berupa angka.',
            'fee.min' => 'Biaya kursus tidak boleh kurang dari 0.',
            'quota.required' => 'Kuota peserta wajib diisi.',
            'quota.integer' => 'Kuota peserta harus berupa angka bulat.',
            'quota.min' => 'Kuota peserta minimal 1.',
            'start_date.required' => 'Tanggal mulai kursus wajib diisi.',
            'start_date.date' => 'Format tanggal mulai tidak valid.',
            'status.required' => 'Status kursus wajib dipilih.',
            'status.in' => 'Status kursus harus salah satu dari: draft, open, atau closed.',
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')->with('success', 'Data kursus baru berhasil disimpan ke database.');
    }
}

