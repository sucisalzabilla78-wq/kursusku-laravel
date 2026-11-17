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
        // Courses
        $webDasar = Course::create([
            'title' => 'Web Dasar',
            'description' => 'Belajar HTML, CSS, dan JavaScript dasar',
            'instructor' => 'Budi Santoso',
            'price' => 300000,
            'duration_hours' => 15,
        ]);

        $laravelDasar = Course::create([
            'title' => 'Laravel Dasar',
            'description' => 'Belajar Laravel dari nol',
            'instructor' => 'Siti Aminah',
            'price' => 500000,
            'duration_hours' => 20,
        ]);

        $phpFundamental = Course::create([
            'title' => 'PHP Fundamental',
            'description' => 'Dasar-dasar pemrograman PHP',
            'instructor' => 'Andi Pratama',
            'price' => 400000,
            'duration_hours' => 18,
        ]);

        // Participants
        $alya = Participant::create([
            'name' => 'Alya Rahma',
            'email' => 'alya@email.com',
            'phone' => '081234567890',
        ]);

        $bima = Participant::create([
            'name' => 'Bima Putra',
            'email' => 'bima@email.com',
            'phone' => '081234567891',
        ]);

        // Enrollments (sesuai gambar)
        Enrollment::create([
            'participant_id' => $alya->id,
            'course_id' => $webDasar->id,
            'status' => 'registered',
            'created_at' => '2026-11-09',
            'updated_at' => '2026-11-09',
        ]);

        Enrollment::create([
            'participant_id' => $bima->id,
            'course_id' => $laravelDasar->id,
            'status' => 'registered',
            'created_at' => '2026-11-23',
            'updated_at' => '2026-11-23',
        ]);

        Enrollment::create([
            'participant_id' => $alya->id,
            'course_id' => $phpFundamental->id,
            'status' => 'registered',
            'created_at' => '2026-11-16',
            'updated_at' => '2026-11-16',
        ]);

        Enrollment::create([
            'participant_id' => $alya->id,
            'course_id' => $laravelDasar->id,
            'status' => 'registered',
            'created_at' => '2026-11-23',
            'updated_at' => '2026-11-23',
        ]);
    }
}