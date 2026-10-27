<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featured = [
            [
                'code' => 'WEB-01',
                'name' => 'Web Dasar',
                'description' => 'Belajar HTML, CSS, dan JavaScript.',
            ],
            [
                'code' => 'PHP-01',
                'name' => 'PHP Dasar',
                'description' => 'Mengenal pemrograman PHP.',
            ],
            [
                'code' => 'LAR-01',
                'name' => 'Laravel Fundamental',
                'description' => 'Belajar membangun aplikasi dengan Laravel.',
            ],
        ];

        return view('home', compact('featured'));
    }
}
