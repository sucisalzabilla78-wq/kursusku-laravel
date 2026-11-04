<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'KursusKu - Belajar Pemrograman Web')</title>

    {{-- Vite Assets with Fallback to CDN for Seamless Local Execution --}}
    @if (file_exists(public_path('hot')) || file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Bootstrap 5.3 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <!-- jQuery 3.7.1 -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!-- Bootstrap 5.3 JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            :root {
                --kursusku-primary: #0f766e;
                --kursusku-secondary: #198f82;
                --kursusku-dark: #134e4a;
                --kursusku-light: #f3f8f4;
            }
            body {
                background-color: var(--kursusku-light);
                color: #223047;
                font-family: Arial, Helvetica, sans-serif;
            }
            .bg-kursusku {
                background-color: var(--kursusku-primary) !important;
            }
            .text-kursusku {
                color: var(--kursusku-primary) !important;
            }
            .btn-kursusku {
                background-color: var(--kursusku-primary);
                border-color: var(--kursusku-primary);
                color: #ffffff;
            }
            .btn-kursusku:hover, .btn-kursusku:focus {
                background-color: var(--kursusku-dark);
                border-color: var(--kursusku-dark);
                color: #ffffff;
            }
            .card-kursusku {
                border-radius: 12px;
                border: 1px solid #dbe8e4;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            }
        </style>
    @endif

    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">
    {{-- Reusable Responsive Navbar --}}
    @include('partials.navbar')

    {{-- Main Content Container --}}
    <main class="flex-grow-1">
        @yield('content')
    </main>

    {{-- Reusable Footer --}}
    <footer class="text-white py-4 mt-auto" style="background-color: #111827;">
        <div class="container text-center">
            <p class="mb-1 fw-bold">KursusKu</p>
            <p class="mb-0 small text-secondary">
                &copy; {{ date('Y') }} KursusKu. Belajar, Praktik, Bangun Proyek.
            </p>
        </div>
    </footer>

    {{-- Page Specific Scripts --}}
    @stack('scripts')
</body>
</html>

