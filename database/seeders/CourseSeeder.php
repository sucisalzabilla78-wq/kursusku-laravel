<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Minimal 8 data kursus contoh (contoh data praktikum Pertemuan 10).
     */
    public function run(): void
    {
        $courses = [
            [
                'code' => 'WEB-01',
                'name' => 'Web Dasar (HTML, CSS, JS)',
                'description' => 'Mempelajari dasar perancangan antarmuka web responsif dengan HTML5 semantik, CSS3 Flexbox/Grid, dan dasar pemrograman JavaScript.',
                'fee' => 150000,
                'quota' => 25,
                'start_date' => '2026-11-15',
                'status' => 'open',
            ],
            [
                'code' => 'PHP-01',
                'name' => 'Pemrograman PHP Dasar',
                'description' => 'Mengenal sintaks dasar PHP, manipulasi string & array, percabangan, perulangan, pemrosesan form, dan dasar Object-Oriented Programming (OOP).',
                'fee' => 200000,
                'quota' => 20,
                'start_date' => '2026-11-20',
                'status' => 'open',
            ],
            [
                'code' => 'LAR-01',
                'name' => 'Mastering Laravel MVC',
                'description' => 'Membangun aplikasi web tangguh dengan arsitektur Model-View-Controller, routing RESTful, Blade templating, migrasi skema, dan Eloquent ORM.',
                'fee' => 350000,
                'quota' => 15,
                'start_date' => '2026-11-25',
                'status' => 'open',
            ],
            [
                'code' => 'DB-01',
                'name' => 'Desain Database & SQL Relasional',
                'description' => 'Perancangan diagram ERD, normalisasi skema 1NF sampai 3NF, optimasi indeks, serta teknik query SQL relasional (MySQL / MariaDB).',
                'fee' => 250000,
                'quota' => 20,
                'start_date' => '2026-12-01',
                'status' => 'open',
            ],
            [
                'code' => 'API-01',
                'name' => 'RESTful API Development',
                'description' => 'Arsitektur pembuatan Web Service berbasis JSON, autentikasi stateless, manajemen status kode HTTP, dan pengujian endpoint menggunakan Postman.',
                'fee' => 300000,
                'quota' => 15,
                'start_date' => '2026-12-05',
                'status' => 'draft',
            ],
            [
                'code' => 'JS-02',
                'name' => 'Modern JavaScript & DOM Scripting',
                'description' => 'Pendalaman fitur ECMAScript terkini (ES6+), async/await, Fetch API, manipulasi interaktif Document Object Model, serta jQuery.',
                'fee' => 200000,
                'quota' => 25,
                'start_date' => '2026-12-10',
                'status' => 'draft',
            ],
            [
                'code' => 'GIT-01',
                'name' => 'Version Control dengan Git & GitHub',
                'description' => 'Penguasaan alur kerja Git, staging area, branching, merging, conflict resolution, standar commit message, serta kolaborasi tim via GitHub.',
                'fee' => 0,
                'quota' => 30,
                'start_date' => '2026-12-12',
                'status' => 'open',
            ],
            [
                'code' => 'SEC-01',
                'name' => 'Keamanan Web & Best Practice Dev',
                'description' => 'Identifikasi dan mitigasi kerentanan keamanan web OWASP Top 10, perlindungan dari SQL Injection, XSS, CSRF, serta sanitasi input formulir.',
                'fee' => 400000,
                'quota' => 10,
                'start_date' => '2026-12-15',
                'status' => 'closed',
            ],
        ];

        foreach ($courses as $course) {
            Course::updateOrCreate(
                ['code' => $course['code']],
                $course
            );
        }
    }
}

