# Laporan Praktikum Pertemuan 13: KursusKu

## 1. Judul Sementara
Pengembangan Sistem Manajemen Kursus Berbasis Laravel dengan Pencarian Server-Side, Filter Status, dan Progressive Enhancement.

## 2. Problem Statement
Daftar kursus yang semakin banyak menyulitkan pengguna dalam menemukan kursus spesifik. Tanpa fitur pencarian dan pembagian halaman, pengguna harus melakukan scrolling berlebihan dan kesulitan memfilter kursus berdasarkan status (Open/Closed/Draft).

## 3. Gap Analisis
Kondisi awal hanya menampilkan daftar CRUD standar. Kebutuhan yang belum terpenuhi adalah kemampuan membatasi tampilan (pagination 10/halaman), mempertahankan state pencarian saat pindah halaman (withQueryString), dan fallback tampilan saat JavaScript dimatikan.

## 4. Tabel Skenario Uji (Test Matrix)
| Skenario | Input | Expected | Actual | Status |
| :--- | :--- | :--- | :--- | :--- |
| 0 hasil | `q=xyz999` | Empty state | Muncul pesan kosong | [Isi: Pass] |
| 1 hasil | `q=WEB-101` | 1 record | Muncul 1 data | [Isi: Pass] |
| >10 hasil | `status=open` | Pagination | Muncul 10 data + Page 2 | [Isi: Pass] |
| Keyword spasi | `q=Web Modern` | Keyword terbaca | Data muncul normal | [Isi: Pass] |
| Filter + Page 2 | `status=open`, Page 2 | Query state tetap | URL ada `&page=2` | [Isi: Pass] |

## 5. Hasil Awal
Kelima skenario uji fungsional berhasil dijalankan. Fitur `withQueryString()` terbukti bekerja dengan mempertahankan parameter `status=open` pada URL saat berpindah ke halaman 2. Empty state berhasil menangani kondisi 0 hasil tanpa memicu error server.