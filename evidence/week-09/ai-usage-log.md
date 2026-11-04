# AI Usage Log - Praktikum Pertemuan 9
## Framework Laravel: Bootstrap, jQuery Ajax, dan Form Pendaftaran

**Nama:** Suci Salzabilla  
**NIM:** 2524218  
**Kelas:** 5G  
**Tanggal:** 3 November 2026  
**Project:** KursusKu - Laravel MVC  
**Lokasi Project:** `C:\laragon\www\kursusku-Laravel`

---

## 🎯 Tujuan Praktikum

Mengintegrasikan Bootstrap, jQuery, dan Ajax ke dalam aplikasi Laravel untuk membuat tampilan dan form pendaftaran kursus yang interaktif, termasuk fitur pengecekan sisa kursi secara real-time tanpa perlu memuat ulang halaman.

---

## 📋 Daftar Penggunaan AI

### 1. Instalasi dan Konfigurasi Vite dengan Bootstrap dan jQuery

**Tanggal:** 3 November 2026

**Tugas:** Menginstal package npm dan mengonfigurasi Vite agar Bootstrap dan jQuery dapat digunakan dalam project Laravel.

**Prompt yang digunakan:**
> "Bagaimana cara menginstal dan mengatur Bootstrap serta jQuery pada project Laravel saya menggunakan Vite?"

**Bantuan AI:**
- Memberikan panduan instalasi Bootstrap dan jQuery menggunakan npm.
- Membantu mengatur file `resources/js/app.js`.
- Membantu mengatur file `resources/css/app.css`.
- Memberikan panduan menjalankan Vite menggunakan perintah `npm run dev`.
- Membantu memeriksa apakah Bootstrap dan jQuery sudah berhasil dimuat.

**Kode yang digunakan:**

```javascript
// resources/js/app.js
import './bootstrap';
import 'bootstrap';
import $ from 'jquery';

window.$ = window.jQuery = $;
```

### 2. Konfigurasi CSS Bootstrap

**Tanggal:** 3 November 2026

**Tugas:** Mengatur file CSS agar tampilan aplikasi menggunakan Bootstrap dan dapat disesuaikan dengan desain KursusKu.

**Prompt yang digunakan:**
> "Bagaimana cara mengatur CSS Bootstrap pada Laravel agar tampilan website KursusKu bisa diubah sesuai desain yang saya inginkan?"

**Bantuan AI:**
- Memberikan arahan untuk mengimpor Bootstrap CSS.
- Membantu mengatur warna background, navbar, tombol, dan komponen website.
- Memberikan contoh penggunaan CSS tambahan untuk menyesuaikan tampilan aplikasi.

**Kode yang digunakan:**

```css
/* resources/css/app.css */
@import 'bootstrap/dist/css/bootstrap.min.css';

body {
    background-color: #f8f9fa;
    color: #212529;
}

.navbar-brand {
    font-weight: 800;
}
```

### 3. Perbaikan Tampilan Website KursusKu

**Tanggal:** 3 November 2026

**Tugas:** Memperbaiki tampilan halaman beranda agar sesuai dengan desain yang diharapkan.

**Prompt yang digunakan:**
> "Kenapa tampilan website Laravel saya masih belum berubah setelah CSS diganti?"

**Bantuan AI:**
- Membantu memeriksa kode CSS yang digunakan.
- Memberikan arahan untuk memastikan file CSS sudah terhubung dengan Vite.
- Membantu memeriksa proses kompilasi aset menggunakan npm.
- Memberikan solusi ketika perubahan warna dan tampilan belum muncul di browser.

### 4. Menjalankan dan Menguji Aplikasi Laravel

**Tanggal:** 3 November 2026

**Tugas:** Menjalankan aplikasi KursusKu melalui browser dan memeriksa hasil perubahan kode.

**Prompt yang digunakan:**
> "Setelah mengisi kode di Visual Studio Code, apa langkah selanjutnya agar perubahan bisa tampil di browser?"

**Bantuan AI:**
- Memberikan panduan menjalankan server Laravel.
- Membantu menjalankan Vite melalui terminal.
- Menjelaskan cara membuka aplikasi melalui localhost.
- Membantu mengidentifikasi kendala ketika browser belum menampilkan perubahan.

---

## 📝 Kesimpulan

Penggunaan AI dalam praktikum pertemuan 9 membantu proses pengembangan aplikasi KursusKu menggunakan framework Laravel. AI dimanfaatkan sebagai alat bantu untuk memahami konfigurasi Bootstrap, jQuery, Vite, pengaturan CSS, serta mengatasi kesalahan yang terjadi selama pengerjaan project.

Seluruh arahan dan kode yang diberikan AI diperiksa dan disesuaikan kembali dengan kebutuhan project. Dengan demikian, penggunaan AI membantu meningkatkan pemahaman dan mempermudah proses pengerjaan praktikum.