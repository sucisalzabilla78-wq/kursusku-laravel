<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #0f766e;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('home') }}">
            <span class="d-inline-flex justify-content-center align-items-center rounded-3 bg-white text-teal fw-bold fs-5" style="width: 36px; height: 36px; color: #0f766e;">
                K
            </span>
            <span>KursusKu</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#kursuskuNavbar" aria-controls="kursuskuNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="kursuskuNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('courses.*') ? 'active fw-bold' : '' }}" href="{{ route('courses.index') }}">
                        Daftar Kursus
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('enrollment.*') ? 'active fw-bold' : '' }}" href="{{ route('enrollment.create') }}">
                        Pendaftaran Kursus
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('evidence.week07') ? 'active fw-bold' : '' }}" href="{{ route('evidence.week07') }}">
                        Evidence Week 07
                    </a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-sm btn-light fw-semibold text-teal px-3 py-2 shadow-sm" style="color: #0f766e;" href="{{ route('enrollment.create') }}">
                        Daftar Sekarang
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

