<?php

namespace App\Http\Controllers;

use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->take(3)->get();
        return view('courses.home', compact('courses'));
    }
}