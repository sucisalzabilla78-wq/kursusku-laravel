<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KursusKu | Laravel MVC</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #223047;
            background: #f3f8f4;
            line-height: 1.7;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: min(1120px, 90%);
            margin: auto;
        }

        /* HEADER */
        .header {
            background: #198f82;
            color: white;
        }

        .header-content {
            min-height: 94px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            background: white;
            color: #198f82;
            border-radius: 12px;
            font-size: 28px;
            font-weight: bold;
        }

        .brand h2 {
            font-size: 25px;
            line-height: 1.2;
        }

        .brand p {
            font-size: 14px;
        }

        .milestone {
            border: 1px solid white;
            padding: 7px 18px;
            border-radius: 30px;
            font-size: 14px;
        }

        /* NAVIGASI */
        .navigation {
            background: #11685f;
        }

        .navigation .container {
            display: flex;
            flex-wrap: wrap;
            gap: 32px;
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .navigation a {
            color: white;
            font-weight: bold;
        }

        .navigation a:hover {
            color: #c8f7e7;
        }

        /* HERO */
        .hero {
            padding: 80px 0 75px;
            background:
                radial-gradient(
                    circle at 85% 15%,
                    #f4f5d9 0,
                    transparent 34%
                ),
                linear-gradient(115deg, #e5faf2, #f7f9ed);
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .eyebrow {
            color: #168b80;
            font-size: 15px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: clamp(35px, 4vw, 54px);
            line-height: 1.12;
            letter-spacing: -1.5px;
            margin-bottom: 24px;
        }

        .hero-description {
            color: #63758a;
            font-size: 17px;
            margin-bottom: 28px;
        }

        .buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .button {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.2s;
        }

        .button-primary {
            background: #168f80;
            color: white;
            border: 1px solid #168f80;
        }

        .button-primary:hover {
            background: #11685f;
        }

        .button-secondary {
            background: white;
            color: #11685f;
            border: 1px solid #c5ddd5;
        }

        .button-secondary:hover {
            background: #e5faf2;
        }

        /* FOTO */
        .hero-image-wrapper {
            height: 380px;
            padding: 7px;
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

        /* BAGIAN UMUM */
        .section {
            padding: 65px 0;
        }

        .section-heading {
            margin-bottom: 28px;
        }

        .section-heading h2 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .section-heading p {
            color: #69788a;
        }

        /* ALUR MVC */
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
        }

        .mvc-card p {
            font-size: 12px;
            color: #728093;
        }

        /* KURSUS */
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
        }

        .course-card h3 {
            margin-bottom: 10px;
        }

        .course-card p {
            color: #69788a;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .course-link {
            color: #168b80;
            font-weight: bold;
        }

        /* FOOTER */
        .footer {
            background: #11685f;
            color: white;
            text-align: center;
            padding: 25px 0;
        }

        .footer p {
            font-size: 14px;
        }

        /* TAMPILAN HP */
        @media (max-width: 800px) {
            .hero {
                padding: 45px 0;
            }

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

            .header-content {
                min-height: 80px;
            }
        }

        @media (max-width: 480px) {
            .brand h2 {
                font-size: 21px;
            }

            .milestone {
                padding: 5px 10px;
                font-size: 12px;
            }

            .navigation .container {
                gap: 18px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero-image-wrapper {
                height: 260px;
            }

            .mvc-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <div class="container header-content">
            <div class="brand">
                <div class="brand-icon">K</div>

                <div>
                    <h2>KursusKu</h2>
                    <p>Laravel MVC</p>
                </div>
            </div>

            <div class="milestone">Milestone 7</div>
        </div>
    </header>

    <!-- NAVIGASI -->
    <nav class="navigation">
        <div class="container">
            <a href="#beranda">Beranda</a>
            <a href="#alur-mvc">Alur MVC</a>
            <a href="#kursus">Kursus Pilihan</a>
        </div>
    </nav>

    <!-- HALAMAN UTAMA -->
    <main>
        <section class="hero" id="beranda">
            <div class="container hero-grid">

                <div class="hero-content">
                    <p class="eyebrow">
                        PERTEMUAN 7 · FRAMEWORK LARAVEL
                    </p>

                    <h1>
                        Belajar terstruktur dengan Route,
                        Controller, dan Blade.
                    </h1>

                    <p class="hero-description">
                        Landing page KursusKu dipindahkan dari PHP
                        biasa ke pola framework Laravel. Request
                        masuk melalui route, data disiapkan
                        controller, lalu Blade merender HTML.
                    </p>

                    <div class="buttons">
                        <a href="#kursus" class="button button-primary">
                            Program Belajar Unggulan
                        </a>

                        <a href="#alur-mvc" class="button button-secondary">
                            Lihat Alur MVC
                        </a>
                    </div>
                </div>

                <div class="hero-image-wrapper">
                   <img
    src="{{ asset('images/mahasiswa-coding.jpg') }}"
    alt="Mahasiswa sedang belajar pemrograman"
    style="width: 100%; height: 100%; object-fit: cover;
           border-radius: 24px;"
>
                    >
                </div>

            </div>
        </section>

        <!-- ALUR MVC -->
        <section class="section" id="alur-mvc">
            <div class="container">
                <div class="section-heading">
                    <h2>Alur MVC</h2>
                    <p>
                        Memahami proses halaman web di dalam Laravel.
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

        <!-- KURSUS PILIHAN -->
        <section class="section courses" id="kursus">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">TINGKATKAN KETERAMPILAN</p>
                    <h2>Program Kursus Pilihan</h2>
                    <p>
                        Mulai belajar pemrograman dari dasar
                        dan kembangkan kemampuanmu.
                    </p>
                </div>

                <div class="course-grid">
                    <article class="course-card">
                        <span class="course-tag">PEMULA</span>
                        <h3>Web Development</h3>
                        <p>
                            Pelajari HTML, CSS, dan dasar-dasar
                            membangun halaman website.
                        </p>
                        <a href="#beranda" class="course-link">
                            Mulai Belajar →
                        </a>
                    </article>

                    <article class="course-card">
                        <span class="course-tag">PEMROGRAMAN</span>
                        <h3>PHP Dasar</h3>
                        <p>
                            Kenali variabel, fungsi, percabangan,
                            dan pemrograman PHP.
                        </p>
                        <a href="#beranda" class="course-link">
                            Mulai Belajar →
                        </a>
                    </article>

                    <article class="course-card">
                        <span class="course-tag">FRAMEWORK</span>
                        <h3>Laravel Fundamental</h3>
                        <p>
                            Pelajari route, controller, Blade,
                            dan struktur aplikasi Laravel.
                        </p>
                        <a href="#alur-mvc" class="course-link">
                            Mulai Belajar →
                        </a>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <p>
                &copy; {{ date('Y') }} KursusKu.
                Belajar, Praktik, Bangun Proyek.
            </p>
        </div>
    </footer>
<section id="evidence-week-07" style="padding: 40px 20px; background: #f1f5f9; font-family: Arial, sans-serif;">
    <div style="max-width: 1000px; margin: auto; padding: 24px; background: white; border-radius: 16px;">
        <p style="font-size: 12px; color: #64748b; font-weight: bold;">
            EVIDENCE WEEK 07
        </p>

        <h2 style="color: #1e293b;">
            Route → Controller → Blade
        </h2>

        <p style="color: #64748b;">
            KursusKu Laravel · PTIK
        </p>

        <div style="display: flex; flex-wrap: wrap; gap: 12px;">
            <div style="flex: 1; min-width: 200px; padding: 20px; background: #f8fafc; border-radius: 12px;">
                <h3>routes/web.php</h3>
                <p>Mengatur alamat halaman.</p>
            </div>

            <div style="flex: 1; min-width: 200px; padding: 20px; background: #f8fafc; border-radius: 12px;">
                <h3>HomeController.php</h3>
                <p>Mengatur proses halaman.</p>
            </div>

            <div style="flex: 1; min-width: 200px; padding: 20px; background: #f8fafc; border-radius: 12px;">
                <h3>home.blade.php</h3>
                <p>Menampilkan website.</p>
            </div>
        </div>
    </div>
</section>
</body>
</html>
