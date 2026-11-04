@extends('layouts.app')

@section('title', 'KursusKu | Belajar, Praktik, Bangun Proyek')

@push('styles')
<style>
    /* Custom Styling Halaman Beranda (Preservasi Visual Pertemuan 7) */
    .hero {
        padding: 70px 0 65px;
        background:
            radial-gradient(circle at 85% 15%, #f4f5d9 0, transparent 34%),
            linear-gradient(115deg, #e5faf2, #f7f9ed);
    }

    .hero-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        align-items: center;
    }

    .eyebrow {
        color: #168b80;
        font-size: 14px;
        font-weight: bold;
        letter-spacing: 2px;
        margin-bottom: 16px;
    }

    .hero h1 {
        font-size: clamp(32px, 3.8vw, 50px);
        line-height: 1.15;
        letter-spacing: -1.2px;
        margin-bottom: 20px;
        color: #1b2a3a;
        font-weight: 800;
    }

    .hero-description {
        color: #556980;
        font-size: 17px;
        margin-bottom: 28px;
        line-height: 1.7;
    }

    .buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .button {
        display: inline-block;
        padding: 12px 24px;
        border-radius: 10px;
        font-weight: bold;
        text-decoration: none;
        transition: 0.2s ease-in-out;
    }

    .button-primary {
        background: #168f80;
        color: white;
        border: 1px solid #168f80;
    }

    .button-primary:hover {
        background: #11685f;
        color: white;
    }

    .button-secondary {
        background: white;
        color: #11685f;
        border: 1px solid #c5ddd5;
    }

    .button-secondary:hover {
        background: #e5faf2;
        color: #0d544c;
    }

    .hero-image-wrapper {
        height: 380px;
        padding: 8px;
        background: white;
        border-radius: 26px;
        box-shadow: 0 15px 35px rgba(30, 70, 55, 0.10);
        overflow: hidden;
    }

    .hero-image {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        border-radius: 20px;
    }

    .section {
        padding: 65px 0;
    }

    .section-heading {
        margin-bottom: 30px;
    }

    .section-heading h2 {
        font-size: 30px;
        margin-bottom: 8px;
        color: #1b2a3a;
        font-weight: 700;
    }

    .section-heading p {
        color: #69788a;
    }

    .mvc-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 12px;
    }

    .mvc-card {
        background: white;
        border: 1px solid #dce9e3;
        border-radius: 13px;
        padding: 22px 12px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(30, 70, 55, 0.04);
    }

    .mvc-number {
        width: 35px;
        height: 35px;
        margin: 0 auto 10px;
        display: grid;
        place-items: center;
        background: #def5eb;
        color: #168b80;
        border-radius: 50%;
        font-weight: bold;
    }

    .mvc-card h3 {
        font-size: 15px;
        margin-bottom: 5px;
        color: #1f2d3d;
    }

    .mvc-card p {
        font-size: 12px;
        color: #728093;
        margin-bottom: 0;
    }

    .courses {
        background: #eaf7f0;
    }

    .course-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .course-card {
        background: white;
        padding: 25px;
        border-radius: 16px;
        border: 1px solid #dce9e3;
        box-shadow: 0 8px 22px rgba(30, 70, 55, 0.05);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .course-tag {
        display: inline-block;
        background: #def5eb;
        color: #137c70;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        margin-bottom: 12px;
        width: fit-content;
    }

    .course-card h3 {
        margin-bottom: 10px;
        color: #1b2a3a;
        font-size: 20px;
    }

    .course-card p {
        color: #69788a;
        font-size: 14px;
        margin-bottom: 18px;
    }

    .course-link {
        color: #168b80;
        font-weight: bold;
        text-decoration: none;
    }

    .course-link:hover {
        color: #11685f;
        text-decoration: underline;
    }

    @media (max-width: 850px) {
        .hero-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .hero-image-wrapper {
            height: 320px;
        }

        .mvc-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .course-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .mvc-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
{{-- HERO SECTION --}}
<section class="hero" id="beranda">
    <div class="container hero-grid">
        <div class="hero-content">
            <p class="eyebrow">
                PLATFORM BELAJAR PEMROGRAMAN WEB
            </p>

            <h1>
                Belajar terstruktur dengan Route, Controller, dan Blade.
            </h1>

            <p class="hero-description">
                Landing page KursusKu dibangun dengan pola arsitektur MVC framework Laravel. 
                Request masuk melalui route, data diproses controller, lalu Blade merender tampilan yang modular dan dinamis.
            </p>

            <div class="buttons">
                <a href="{{ route('enrollment.create') }}" class="button button-primary">
                    Daftar Kursus Sekarang &rarr;
                </a>

                <a href="#kursus" class="button button-secondary">
                    Lihat Program Kursus
                </a>
            </div>
        </div>

        <div class="hero-image-wrapper">
            <img
                src="{{ asset('images/mahasiswa-coding.jpg') }}"
                alt="Mahasiswa sedang belajar pemrograman"
                class="hero-image"
            >
        </div>
    </div>
</section>

{{-- ALUR MVC SECTION --}}
<section class="section" id="alur-mvc">
    <div class="container">
        <div class="section-heading">
            <h2>Alur MVC</h2>
            <p>
                Memahami proses penanganan request di dalam framework Laravel.
            </p>
        </div>

        <div class="mvc-grid">
            <div class="mvc-card">
                <div class="mvc-number">1</div>
                <h3>Browser</h3>
                <p>GET /</p>
            </div>

            <div class="mvc-card">
                <div class="mvc-number">2</div>
                <h3>Route</h3>
                <p>routes/web.php</p>
            </div>

            <div class="mvc-card">
                <div class="mvc-number">3</div>
                <h3>Controller</h3>
                <p>HomeController</p>
            </div>

            <div class="mvc-card">
                <div class="mvc-number">4</div>
                <h3>Blade View</h3>
                <p>home.blade.php</p>
            </div>

            <div class="mvc-card">
                <div class="mvc-number">5</div>
                <h3>Response</h3>
                <p>HTML ke browser</p>
            </div>
        </div>
    </div>
</section>

{{-- KURSUS PILIHAN SECTION --}}
<section class="section courses" id="kursus">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">TINGKATKAN KETERAMPILAN</p>
            <h2>Program Kursus Pilihan</h2>
            <p>
                Mulai belajar pemrograman dari dasar dan kembangkan kemampuan coding-mu.
            </p>
        </div>

        <div class="course-grid">
            @if (isset($featured) && count($featured) > 0)
                @foreach ($featured as $item)
                    <article class="course-card">
                        <div>
                            <span class="course-tag">{{ $item['code'] }}</span>
                            <h3>{{ $item['name'] }}</h3>
                            <p>{{ $item['description'] }}</p>
                        </div>
                        <a href="{{ route('enrollment.create') }}" class="course-link mt-3">
                            Daftar Kursus Ini &rarr;
                        </a>
                    </article>
                @endforeach
            @else
                <article class="course-card">
                    <div>
                        <span class="course-tag">PEMULA</span>
                        <h3>Web Development</h3>
                        <p>Pelajari HTML, CSS, dan dasar-dasar membangun halaman website.</p>
                    </div>
                    <a href="{{ route('enrollment.create') }}" class="course-link mt-3">
                        Daftar Kursus Ini &rarr;
                    </a>
                </article>

                <article class="course-card">
                    <div>
                        <span class="course-tag">PEMROGRAMAN</span>
                        <h3>PHP Dasar</h3>
                        <p>Kenali variabel, fungsi, percabangan, dan pemrograman PHP.</p>
                    </div>
                    <a href="{{ route('enrollment.create') }}" class="course-link mt-3">
                        Daftar Kursus Ini &rarr;
                    </a>
                </article>

                <article class="course-card">
                    <div>
                        <span class="course-tag">FRAMEWORK</span>
                        <h3>Laravel Fundamental</h3>
                        <p>Pelajari route, controller, Blade, dan struktur aplikasi Laravel.</p>
                    </div>
                    <a href="{{ route('enrollment.create') }}" class="course-link mt-3">
                        Daftar Kursus Ini &rarr;
                    </a>
                </article>
            @endif
        </div>
    </div>
</section>

{{-- EVIDENCE SECTION --}}
<section id="evidence-week-07" class="py-5" style="background: #f1f5f9;">
    <div class="container">
        <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm border">
            <p class="text-uppercase fw-bold text-muted small mb-2">
                EVIDENCE WEEK 07
            </p>

            <h2 class="fw-bold text-dark mb-1">
                Route &rarr; Controller &rarr; Blade
            </h2>

            <p class="text-muted mb-4">
                KursusKu Laravel &middot; PTIK
            </p>

            <div class="row g-3">
                <div class="col-md-4">
                    <div class="p-3 bg-light rounded-3 h-100 border">
                        <h5 class="fw-bold text-dark">routes/web.php</h5>
                        <p class="text-muted small mb-0">Mengatur alamat halaman dan HTTP request.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 bg-light rounded-3 h-100 border">
                        <h5 class="fw-bold text-dark">HomeController.php</h5>
                        <p class="text-muted small mb-0">Mengatur logika dan data halaman.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 bg-light rounded-3 h-100 border">
                        <h5 class="fw-bold text-dark">home.blade.php</h5>
                        <p class="text-muted small mb-0">Merender tampilan HTML responsif dengan Blade.</p>
                    </div>
                </div>
            </div>

            <div class="mt-4 pt-2">
                <a href="{{ route('evidence.week07') }}" class="btn btn-outline-teal btn-sm fw-semibold" style="color: #0f766e; border-color: #0f766e;">
                    Buka Halaman Dokumentasi Evidence Week 07 &rarr;
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
