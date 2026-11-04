-- ============================================================
-- SQL Schema & Data Contoh KursusKu - Pertemuan 10
-- Database: kursus
-- Dibuat untuk eksekusi via GUI phpMyAdmin (Laragon) atau CLI
-- ============================================================

-- 1. Pembuatan Tabel `courses` (Jika belum dibuat lewat migrasi)
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text DEFAULT NULL,
  `fee` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `quota` smallint(5) UNSIGNED NOT NULL DEFAULT 20,
  `start_date` date NOT NULL,
  `status` enum('draft','open','closed') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courses_code_unique` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Penyisipan 8 Data Kursus Contoh (Contoh Data Praktikum)
INSERT INTO `courses` (`code`, `name`, `description`, `fee`, `quota`, `start_date`, `status`, `created_at`, `updated_at`) VALUES
('WEB-01', 'Web Dasar (HTML, CSS, JS)', 'Mempelajari dasar perancangan antarmuka web responsif dengan HTML5 semantik, CSS3 Flexbox/Grid, dan dasar pemrograman JavaScript.', 150000, 25, '2026-11-15', 'open', NOW(), NOW()),
('PHP-01', 'Pemrograman PHP Dasar', 'Mengenal sintaks dasar PHP, manipulasi string & array, percabangan, perulangan, pemrosesan form, dan dasar Object-Oriented Programming (OOP).', 200000, 20, '2026-11-20', 'open', NOW(), NOW()),
('LAR-01', 'Mastering Laravel MVC', 'Membangun aplikasi web tangguh dengan arsitektur Model-View-Controller, routing RESTful, Blade templating, migrasi skema, dan Eloquent ORM.', 350000, 15, '2026-11-25', 'open', NOW(), NOW()),
('DB-01', 'Desain Database & SQL Relasional', 'Perancangan diagram ERD, normalisasi skema 1NF sampai 3NF, optimasi indeks, serta teknik query SQL relasional (MySQL / MariaDB).', 250000, 20, '2026-12-01', 'open', NOW(), NOW()),
('API-01', 'RESTful API Development', 'Arsitektur pembuatan Web Service berbasis JSON, autentikasi stateless, manajemen status kode HTTP, dan pengujian endpoint menggunakan Postman.', 300000, 15, '2026-12-05', 'draft', NOW(), NOW()),
('JS-02', 'Modern JavaScript & DOM Scripting', 'Pendalaman fitur ECMAScript terkini (ES6+), async/await, Fetch API, manipulasi interaktif Document Object Model, serta jQuery.', 200000, 25, '2026-12-10', 'draft', NOW(), NOW()),
('GIT-01', 'Version Control dengan Git & GitHub', 'Penguasaan alur kerja Git, staging area, branching, merging, conflict resolution, standar commit message, serta kolaborasi tim via GitHub.', 0, 30, '2026-12-12', 'open', NOW(), NOW()),
('SEC-01', 'Keamanan Web & Best Practice Dev', 'Identifikasi dan mitigasi kerentanan keamanan web OWASP Top 10, perlindungan dari SQL Injection, XSS, CSRF, serta sanitasi input formulir.', 400000, 10, '2026-12-15', 'closed', NOW(), NOW())
ON DUPLICATE KEY UPDATE 
  `name` = VALUES(`name`),
  `description` = VALUES(`description`),
  `fee` = VALUES(`fee`),
  `quota` = VALUES(`quota`),
  `start_date` = VALUES(`start_date`),
  `status` = VALUES(`status`),
  `updated_at` = NOW();

