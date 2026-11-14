<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['kode'=>'WEB-01','nama'=>'Web Dasar (HTML, CSS, JS)','deskripsi'=>'Mempelajari dasar perancangan antarmuka web responsif.','harga'=>150000,'kapasitas'=>25,'tanggal'=>'2026-11-15','status'=>'open'],
            ['kode'=>'PHP-01','nama'=>'Pemrograman PHP Dasar','deskripsi'=>'Mengenal sintaks dasar PHP, manipulasi string & array, percabangan, perulangan, dan dasar OOP.','harga'=>200000,'kapasitas'=>20,'tanggal'=>'2026-11-20','status'=>'open'],
            ['kode'=>'LAR-01','nama'=>'Mastering Laravel MVC','deskripsi'=>'Membangun aplikasi web tangguh dengan arsitektur MVC, routing RESTful, Blade templating, dan Eloquent ORM.','harga'=>350000,'kapasitas'=>15,'tanggal'=>'2026-11-25','status'=>'open'],
            ['kode'=>'DB-01','nama'=>'Desain Database & SQL Relasional','deskripsi'=>'Perancangan diagram ERD, normalisasi schema 1NF sampai 3NF, optimasi indeks, dan query SQL relasional.','harga'=>250000,'kapasitas'=>20,'tanggal'=>'2026-12-01','status'=>'open'],
            ['kode'=>'API-01','nama'=>'RESTful API Development','deskripsi'=>'Arsitektur Web Service berbasis JSON, autentikasi stateless, dan pengujian endpoint menggunakan Postman.','harga'=>300000,'kapasitas'=>15,'tanggal'=>'2026-12-05','status'=>'draft'],
        ];

        foreach ($courses as $c) {
            Course::create($c);
        }
    }
}