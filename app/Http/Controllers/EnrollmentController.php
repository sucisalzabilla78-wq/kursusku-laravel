<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['participant', 'course'])
            ->latest()
            ->get();

        return view('enrollment.index', compact('enrollments'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('enrollment.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'participant_name' => 'required|string|max:255',
            'participant_email' => 'required|email|max:255',
            'participant_phone' => 'nullable|string|max:20',
            'course_id' => 'required|exists:courses,id',
            'status' => ['required', Rule::in(['pending', 'active', 'completed', 'registered', 'cancelled'])],
        ]);

        $participant = Participant::firstOrCreate(
            ['email' => $request->participant_email],
            [
                'name' => $request->participant_name,
                'phone' => $request->participant_phone,
            ]
        );

        Enrollment::create([
            'course_id' => $request->course_id,
            'participant_id' => $participant->id,
            'status' => $request->status,
        ]);

        return redirect()->route('enrollment.index')
            ->with('success', 'Enrollment berhasil disimpan.');
    }
}