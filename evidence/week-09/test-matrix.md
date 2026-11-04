# Matriks Pengujian - Pertemuan 9 (KursusKu Laravel)

Dokumen ini memuat skenario pengujian fungsional dan teknis untuk fitur Master Layout, Integrasi Bootstrap & jQuery, Form Pendaftaran, Validasi Laravel, serta Pengecekan Ketersediaan Kursus via jQuery Ajax.

| ID | Skenario Pengujian | Langkah Pengujian | Hasil yang Diharapkan | Status Verifikasi Kode | Status Uji Browser & DevTools (Manual) |
|:--:|:-------------------|:------------------|:----------------------|:----------------------:|:--------------------------------------:|
| TC-01 | Tampilan Beranda & Master Layout | Buka URL `/` di browser | Halaman beranda memuat master layout lengkap dengan navbar dan footer terpadu | Selesai (Kode Terverifikasi) | *Menunggu Pengambilan Evidence* |
| TC-02 | Responsivitas Navbar | Buka URL `/` pada mode mobile (viewport < 992px) dan klik tombol toggler | Navbar toggler membuka dan menutup menu navigasi dengan lancar | Selesai (Kode Terverifikasi) | *Menunggu Pengambilan Evidence* |
| TC-03 | Akses Form Pendaftaran | Buka menu "Pendaftaran Kursus" atau URL `/pendaftaran` | Tampil halaman formulir pendaftaran dengan input nama, email, select kursus, dan tombol submit | Selesai (Kode Terverifikasi) | *Menunggu Pengambilan Evidence* |
| TC-04 | Opsi Awal Select Kursus | Periksa elemen dropdown pilihan kursus | Menampilkan opsi default `-- Pilih Kursus yang Diinginkan --` dengan value kosong | Selesai (Kode Terverifikasi) | *Menunggu Pengambilan Evidence* |
| TC-05 | Cek Kuota Web Dasar via Ajax | Pilih opsi "Web Dasar" pada dropdown kursus | Tampil box hijau sisa kursi bertuliskan "Tersedia 12 kursi" secara asinkron tanpa reload halaman | Selesai (Kode Terverifikasi) | *Menunggu Pengambilan Evidence* |
| TC-06 | Cek Kuota PHP Dasar via Ajax | Ubah pilihan kursus menjadi "PHP Dasar" | Box sisa kursi berganti menampilkan "Tersedia 8 kursi" secara real-time tanpa reload | Selesai (Kode Terverifikasi) | *Menunggu Pengambilan Evidence* |
| TC-07 | Cek Kuota Laravel Dasar via Ajax | Ubah pilihan kursus menjadi "Laravel Dasar" | Box sisa kursi berganti menampilkan "Tersedia 4 kursi" secara real-time tanpa reload | Selesai (Kode Terverifikasi) | *Menunggu Pengambilan Evidence* |
| TC-08 | Validasi Data Form Lengkap & Valid | Isi Nama: "Suci Salzabilla", Email valid, Pilih kursus, lalu submit | Form berhasil melewati validasi dan diarahkan ke halaman Preview Pendaftaran | Selesai (Kode Terverifikasi) | *Menunggu Pengambilan Evidence* |
| TC-09 | Validasi Format Email Tidak Valid | Masukkan format email salah (contoh: `suci-tanpa-domain`), lalu submit | Submit dicegah/ditolak, muncul notifikasi error validasi email di bawah input email | Selesai (Kode Terverifikasi) | *Menunggu Pengambilan Evidence* |
| TC-10 | Status HTTP & Response Network Ajax | Buka tab Network DevTools, filter "Fetch/XHR", lalu ubah select kursus | Muncul request GET `/courses/availability?course_id=...` dengan status HTTP 200 OK dan Payload Response JSON | Selesai (Kode Terverifikasi) | *Menunggu Pengambilan Evidence* |
| TC-11 | Pemeriksaan Error Console | Buka tab Console DevTools selama pengujian form dan Ajax | Tidak terdapat pesan uncaught error atau kesalahan fatal JavaScript | Selesai (Kode Terverifikasi) | *Menunggu Pengambilan Evidence* |
| TC-12 | Independensi Request (No Page Reload) | Periksa bilah URL browser saat memilih kursus di dropdown | URL tidak mengalami refresh/reload, DOM sisa kursi terupdate dinamis melalui jQuery DOM manipulation | Selesai (Kode Terverifikasi) | *Menunggu Pengambilan Evidence* |

