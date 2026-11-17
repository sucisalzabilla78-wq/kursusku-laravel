# Tabel Pengujian Praktikum Pertemuan 11

Course CRUD Lanjutan (Show, Form Request, Edit/Update, Delete) - Proyek KursusKu

Nama: [Nama Kamu] | NIM: [NIM Kamu] | [Kelas] | Pemrograman Web III

| No. | Skenario Pengujian | Data Uji | Hasil yang Diharapkan | Actual | Status | Bukti |
|-----|-------------------|----------|----------------------|--------|--------|-------|
| 1 | Menambah kursus valid | Semua data valid | Kursus berhasil ditambahkan | Kursus tersimpan dan tampil di daftar | Pass | |
| 2 | Kode kursus duplikat | Kode yang sudah ada | Validasi menolak data | Ditolak; pesan error tampil di bawah field Kode | Pass | 04-validation-duplicate-code.png |
| 3 | Quota kursus habis | Quota = 0 | Pendaftaran ditolak | Pesan "Kuota penuh" tampil | Pass | 05-validation-quota.png |
| 4 | Edit kursus berhasil | Ubah judul/deskripsi | Data terupdate | Data berubah sesuai input | Pass | 06-update-success.png |
| 5 | Hapus kursus | Klik tombol hapus | Kursus terhapus dari daftar | Kursus hilang dari list | Pass | 07-delete-success.png |
| 6 | Lihat detail kursus | Klik tombol detail | Halaman detail tampil | Informasi lengkap kursus tampil | Pass | 02-course-show.png |
| 7 | Form edit tampil | Klik tombol edit | Form dengan data existing | Form terisi data lama | Pass | 03-course-edit.png |
| 8 | Validasi field kosong | Submit form kosong | Error validasi tampil | Pesan "Field ini wajib diisi" muncul | Pass | |
| 9 | Route list courses | Akses /courses | Daftar kursus tampil | Halaman courses ter-render | Pass | 01-route-list.png |
| 10 | Navigasi menu | Klik menu Kursus | Redirect ke halaman courses | URL berubah ke /courses | Pass | |