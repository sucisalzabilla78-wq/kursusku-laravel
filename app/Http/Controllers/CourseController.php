<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q'));
        $status = trim((string) $request->query('status'));
        $allowedStatuses = ['open', 'closed', 'draft'];

        $courses = Course::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('code', 'like', "%{$search}%")
                      ->orWhere('title', 'like', "%{$search}%");
                });
            })
            ->when(in_array($status, $allowedStatuses, true), function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->orderBy('title')
            ->paginate(10)
            ->withQueryString();

        return view('courses.index', compact('courses', 'search', 'status'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:courses,code',
            'title' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|in:open,closed,draft',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Kursus berhasil ditambahkan.');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'code' => 'required|unique:courses,code,' . $course->id,
            'title' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|in:open,closed,draft',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Kursus berhasil diupdate.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Kursus berhasil dihapus.');
    }
}