<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Participant;
use App\Models\Enrollment;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Courses sesuai gambar
        $courses = [
            ['code' => 'WEB-101', 'title' => 'Web Dasar', 'description' => 'Belajar HTML, CSS, JS', 'instructor' => 'Budi', 'price' => 300000, 'quota' => 25, 'start_date' => '2026-11-09', 'status' => 'Open', 'duration_hours' => 15],
            ['code' => 'PHP-101', 'title' => 'PHP Fundamental', 'description' => 'Dasar PHP', 'instructor' => 'Andi', 'price' => 400000, 'quota' => 25, 'start_date' => '2026-11-16', 'status' => 'Open', 'duration_hours' => 18],
            ['code' => 'LRV-101', 'title' => 'Laravel Dasar', 'description' => 'Belajar Laravel', 'instructor' => 'Siti', 'price' => 500000, 'quota' => 20, 'start_date' => '2026-11-23', 'status' => 'Open', 'duration_hours' => 20],
            ['code' => 'SQL-101', 'title' => 'MySQL Dasar', 'description' => 'Belajar MySQL', 'instructor' => 'Rudi', 'price' => 350000, 'quota' => 30, 'start_date' => '2026-11-30', 'status' => 'Open', 'duration_hours' => 12],
            ['code' => 'UI-101', 'title' => 'Bootstrap UI', 'description' => 'Belajar Bootstrap', 'instructor' => 'Dewi', 'price' => 300000, 'quota' => 25, 'start_date' => '2026-12-07', 'status' => 'Draft', 'duration_hours' => 10],
            ['code' => 'JS-101', 'title' => 'JavaScript Dasar', 'description' => 'Belajar JavaScript', 'instructor' => 'Fajar', 'price' => 400000, 'quota' => 20, 'start_date' => '2026-12-14', 'status' => 'Open', 'duration_hours' => 16],
            ['code' => 'AJAX-101', 'title' => 'jQuery dan Ajax', 'description' => 'Belajar Ajax', 'instructor' => 'Rina', 'price' => 450000, 'quota' => 20, 'start_date' => '2026-12-21', 'status' => 'Draft', 'duration_hours' => 14],
            ['code' => 'API-101', 'title' => 'REST API Dasar', 'description' => 'Belajar REST API', 'instructor' => 'Hadi', 'price' => 550000, 'quota' => 18, 'start_date' => '2026-12-28', 'status' => 'Closed', 'duration_hours' => 22],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }

        // Participants
        $alya = Participant::create(['name' => 'Alya Rahma', 'email' => 'alya@email.com', 'phone' => '081234567890']);
        $bima = Participant::create(['name' => 'Bima Putra', 'email' => 'bima@email.com', 'phone' => '081234567891']);

        // Enrollments
        $webDasar = Course::where('code', 'WEB-101')->first();
        $laravelDasar = Course::where('code', 'LRV-101')->first();
        $phpFundamental = Course::where('code', 'PHP-101')->first();

        Enrollment::create(['participant_id' => $alya->id, 'course_id' => $webDasar->id, 'status' => 'registered', 'created_at' => '2026-11-09', 'updated_at' => '2026-11-09']);
        Enrollment::create(['participant_id' => $bima->id, 'course_id' => $laravelDasar->id, 'status' => 'registered', 'created_at' => '2026-11-23', 'updated_at' => '2026-11-23']);
        Enrollment::create(['participant_id' => $alya->id, 'course_id' => $phpFundamental->id, 'status' => 'registered', 'created_at' => '2026-11-16', 'updated_at' => '2026-11-16']);
        Enrollment::create(['participant_id' => $alya->id, 'course_id' => $laravelDasar->id, 'status' => 'registered', 'created_at' => '2026-11-23', 'updated_at' => '2026-11-23']);
    }
}