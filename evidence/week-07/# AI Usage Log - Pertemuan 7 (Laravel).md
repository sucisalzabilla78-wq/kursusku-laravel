# AI Usage Log - Pertemuan 7 (Laravel)

| No | Masalah/Tujuan | Saran AI | Keputusan Saya | Hasil Uji |
|----|----------------|----------|----------------|-----------|
| 1 | Bingung cara menjalankan perintah Git seperti di gambar (git add, git commit, git log) | AI menjelaskan perintah `git add .`, `git commit -m "..."`, dan `git log --oneline -5` beserta fungsinya | Diterima | Perintah Git berhasil dijalankan di terminal |
| 2 | Error `fatal: adding files failed` saat `git add .` di folder `C:\laragon\www` | AI menjelaskan bahwa folder `kursusku-laravel/` adalah nested git repository. Solusi: masuk ke folder project yang benar dengan `cd kursusku-laravel` | Diterima | `git add .` berhasil setelah pindah ke folder yang benar |
| 3 | Warning `CRLF will be replaced by LF` saat git add | AI menjelaskan ini hanya warning, bukan error. Perbedaan line ending Windows vs Linux. Aman diabaikan. | Diterima | File berhasil di-add, tidak ada error fatal |
| 4 | Ingin membuat repository GitHub seperti gambar (kursusku-laravel dengan folder evidence) | AI memberikan panduan langkah demi langkah: buat repo di GitHub, git init, git remote add origin, git push | Diterima | Repository berhasil dibuat dan di-push ke GitHub |
| 5 | Tampilan halaman HTML di localhost (127.0.0.1:8000) berbeda dengan gambar PNG di GitHub | AI menjelaskan bahwa gambar GitHub adalah file PNG statis (dibuat dengan Draw.io), sedangkan di localhost adalah file HTML dengan kode berbeda. AI memberikan kode HTML lengkap agar tampilan mirip | Diterima | (Belum diuji - perlu implementasi kode HTML baru) |
| 6 | Bingung cara membuat diagram Request Lifecycle seperti di GitHub | AI menyarankan menggunakan Draw.io (app.diagrams.net) atau Figma untuk membuat diagram, lalu export sebagai PNG | Diterima | (Belum diuji - perlu membuat diagram sendiri) |

## Catatan Tambahan:

Saya menggunakan AI (Qwen) sebagai pemandu saat mengalami kebingungan dalam:
- Menjalankan perintah Git dasar
- Memahami error nested git repository
- Memahami warning CRLF/LF
- Membuat dan meng-upload repository ke GitHub
- Membuat tampilan HTML yang mirip dengan diagram di GitHub

Saya tetap mengetik kode sendiri di VS Code, menjalankan perintah di terminal, dan memastikan saya memahami alur kerja Git serta struktur project Laravel.

## Ringkasan Perintah Git yang Dipelajari:

```powershell
# Inisialisasi
git init
git add .
git commit -m "pesan commit"

# Hubungkan ke GitHub
git remote add origin https://github.com/USERNAME/repo.git
git branch -M main
git push -u origin main

# Cek log
git log --oneline -5