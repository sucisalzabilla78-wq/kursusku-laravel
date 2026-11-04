# KursusKu - Platform Belajar Pemrograman Web

Aplikasi web KursusKu dikembangkan bertahap menggunakan framework Laravel sebagai bagian dari praktikum Pemrograman Web III (Pendidikan Teknik Informatika dan Komputer).

---

## Ringkasan Proyek

KursusKu menyajikan katalog program kursus pemrograman, alur pembelajaran berbasis arsitektur MVC, sistem formulir pendaftaran interaktif yang dilengkapi pengecekan ketersediaan kursi secara real-time menggunakan Ajax, serta integrasi database relasional MySQL dengan arsitektur CRUD (Create dan Read).

### Milestone Perkembangan:
- **Pertemuan 7**: Inisialisasi framework Laravel, implementasi dasar MVC (Route &rarr; Controller &rarr; Blade View), dan landing page awal KursusKu.
- **Pertemuan 9**: Integrasi frontend Bootstrap 5 & jQuery melalui Vite, implementasi Master Layout Blade dan Partial Navbar, formulir pendaftaran dengan validasi Laravel, halaman preview data, serta pengecekan sisa kuota kursi kursus secara asinkron (jQuery Ajax) tanpa reload halaman.
- **Pertemuan 10**: Implementasi Database dan CRUD tahap pertama (Create &amp; Read), migrasi skema tabel `courses`, Model Eloquent `Course`, `CourseController` dengan validasi server-side dan mass-assignment, resource routing yang dibatasi (`index`, `create`, `store`), Blade Views (`courses.index` dan `courses.create`), serta seeder 8 data kursus contoh.

---

## Fitur Utama

1. **Master Layout & Reusable Components**:
   - Master layout `resources/views/layouts/app.blade.php` sebagai kerangka utama halaman web.
   - Partial komponen navigasi responsif `resources/views/partials/navbar.blade.php`.
   - Penerapan pewarisan template Blade (`@extends`, `@section`, `@yield`, `@stack`).

2. **Formulir Pendaftaran Siswa Baru (`/pendaftaran`) [Pertemuan 9]**:
   - Proteksi keamanan `@csrf`.
   - Validasi sisi server untuk field `nama`, `email`, dan `course_id`.
   - Notifikasi validasi interaktif dan penandaan isian tidak valid.

3. **Pengecekan Ketersediaan Kursi Dinamis (jQuery Ajax) [Pertemuan 9]**:
   - Endpoint JSON: `/courses/availability?course_id={id}`.
   - Pemanggilan asinkron saat pengguna memilih kursus pada dropdown.
   - Sisa kursi tampil langsung tanpa perlu melakukan refresh halaman browser:
     - **Web Dasar**: 12 kursi
     - **PHP Dasar**: 8 kursi
     - **Laravel Dasar**: 4 kursi
   - Indikator pemrosesan (spinner) dan penanganan galat (*error handling*).

4. **Halaman Preview Data Pendaftaran (`/pendaftaran/preview`) [Pertemuan 9]**:
   - Menampilkan rangkuman data calon siswa yang telah lolos validasi.

5. **Manajemen Katalog Kursus - CRUD Create & Read (`/courses`) [Pertemuan 10]**:
   - **Tabel Database `courses`**: Menyimpan data `code` (unik), `name`, `description`, `fee`, `quota`, `start_date`, `status` (draft/open/closed), dan timestamps.
   - **Model Eloquent `Course`**: Dilengkapi fillable attributes dan casting `start_date` menjadi objek `date`.
   - **Halaman Daftar Kursus (`/courses`)**: Menampilkan katalog kursus dari database MySQL lengkap dengan format nominal Rupiah, badge status warna, jumlah kuota, serta penanganan kondisi kosong (*empty state*).
   - **Halaman Tambah Kursus (`/courses/create`)**: Formulir penambahan data kursus dengan validasi server-side lengkap (`unique`, `min`, `max`, `numeric`, `integer`, `date`, `in`), penandaan error per field, dan flash alert sukses.
   - **Data Kursus Contoh**: Tersedia 8 record data kursus contoh siap pakai melalui `CourseSeeder` maupun berkas SQL `database/courses_sample_data.sql`.

6. **Dokumentasi & Bukti Praktikum**:
   - `evidence/week-07/`: Dokumentasi dan riwayat implementasi Pertemuan 7.
   - `evidence/week-09/`: Matriks pengujian teknis (`test-matrix.md`) dan catatan log pengerjaan (`ai-usage-log.md`).
   - `evidence/week-10/`: Matriks pengujian teknis (`test-matrix.md`) dan catatan log pengerjaan (`ai-usage-log.md`) untuk Pertemuan 10.

---

## Struktur Direktori Utama

```text
kursusku-laravel/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Controller.php
│   │       ├── HomeController.php
│   │       ├── EnrollmentController.php
│   │       └── CourseController.php
│   └── Models/
│       ├── User.php
│       └── Course.php
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   └── 2026_11_04_000001_create_courses_table.php
│   ├── seeders/
│   │   ├── DatabaseSeeder.php
│   │   └── CourseSeeder.php
│   └── courses_sample_data.sql
├── evidence/
│   ├── week-07/
│   ├── week-09/
│   │   ├── test-matrix.md
│   │   └── ai-usage-log.md
│   └── week-10/
│       ├── test-matrix.md
│       └── ai-usage-log.md
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── partials/
│       │   └── navbar.blade.php
│       ├── courses/
│       │   ├── index.blade.php
│       │   └── create.blade.php
│       ├── enrollment/
│       │   ├── create.blade.php
│       │   └── preview.blade.php
│       ├── evidence-week-07.blade.php
│       └── home.blade.php
├── routes/
│   └── web.php
├── .env.example
├── composer.json
├── package.json
└── vite.config.js
```

---

## Panduan Menjalankan Proyek Secara Manual

Bagi pengguna atau penguji di lingkungan lokal Laragon / Windows:

1. **Konfigurasi Database `.env`**:
   Pastikan file `.env` sudah mengarah ke database `kursus`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=kursus
   DB_USERNAME=root
   DB_PASSWORD=
   ```

2. **Eksekusi Migrasi & Data Contoh (Pilih Opsi A atau B)**:

   - **Opsi A: Melalui Terminal / Artisan (Standar Laravel)**:
     ```bash
     php artisan migrate
     php artisan db:seed --class=CourseSeeder
     ```
     *(Atau gabungan: `php artisan migrate --seed`)*

   - **Opsi B: Melalui GUI phpMyAdmin (Tanpa Terminal)**:
     1. Buka browser dan akses phpMyAdmin di `http://localhost/phpmyadmin`.
     2. Pilih database `kursus` pada panel sebelah kiri.
     3. Klik tab **Import** (Impor) atau tab **SQL**.
     4. Salin isi berkas `database/courses_sample_data.sql` dan klik **Go / Kirim**. Tabel `courses` beserta 8 data contoh akan otomatis terbentuk.

3. **Menjalankan Server Web**:
   Jika menggunakan Laragon, pastikan Apache dan MySQL dalam status **Started**. Akses aplikasi melalui virtual host Laragon atau:
   ```bash
   php artisan serve
   ```
   Aplikasi dapat diakses melalui browser pada `http://127.0.0.1:8000`.
