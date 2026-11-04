@extends('layouts.app')

@section('title', 'Pendaftaran Kursus - KursusKu')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            {{-- Header Form --}}
            <div class="text-center mb-4">
                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill fw-semibold mb-2">
                    Formulir Pendaftaran Siswa Baru
                </span>
                <h1 class="h2 fw-bold text-dark mt-2">Mulai Langkah Belajarmu</h1>
                <p class="text-muted">
                    Pilih kursus yang sesuai dengan kebutuhan pengembangan skill pemrogramanmu.
                </p>
            </div>

            {{-- Alert Error Validasi Global --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <strong>Perhatian:</strong> Terdapat data yang belum sesuai validasi:
                    </div>
                    <ul class="mb-0 mt-2 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Card Formulir --}}
            <div class="card card-kursusku shadow-sm bg-white border-0">
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('enrollment.preview') }}" method="POST" id="enrollmentForm" novalidate>
                        @csrf

                        {{-- Input Nama Lengkap --}}
                        <div class="mb-4">
                            <label for="nama" class="form-label fw-semibold text-secondary">
                                Nama Lengkap <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control form-control-lg @error('nama') is-invalid @enderror" 
                                id="nama" 
                                name="nama" 
                                value="{{ old('nama') }}" 
                                placeholder="Contoh: Suci Salzabilla" 
                                required
                            >
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text text-muted">
                                Masukkan nama lengkap untuk keperluan sertifikat kursus.
                            </div>
                        </div>

                        {{-- Input Email --}}
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold text-secondary">
                                Alamat Email <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="email" 
                                class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                placeholder="Contoh: nama@domain.com" 
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text text-muted">
                                Konfirmasi dan materi pembelajaran akan dikirimkan ke email ini.
                            </div>
                        </div>

                        {{-- Select Pilihan Kursus --}}
                        <div class="mb-4">
                            <label for="course_id" class="form-label fw-semibold text-secondary">
                                Pilihan Kursus <span class="text-danger">*</span>
                            </label>
                            <select 
                                class="form-select form-select-lg @error('course_id') is-invalid @enderror" 
                                id="course_id" 
                                name="course_id" 
                                required
                            >
                                <option value="" selected>-- Pilih Kursus yang Diinginkan --</option>
                                @foreach ($courses as $id => $course)
                                    <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>
                                        {{ $course['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Area Dinamis Sisa Kursi via Ajax (Tanpa Reload) --}}
                        <div id="seat-availability-wrapper" class="mb-4 d-none">
                            <div id="seat-availability-box" class="p-3 rounded-3 border d-flex align-items-center gap-3">
                                {{-- Spinner Loading --}}
                                <div id="seat-loading-spinner" class="spinner-border spinner-border-sm text-primary d-none" role="status">
                                    <span class="visually-hidden">Memeriksa kuota...</span>
                                </div>
                                
                                {{-- Pesan Status Kursi --}}
                                <div id="seat-availability-message" class="fw-semibold">
                                    Memeriksa ketersediaan kursi...
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-grid gap-2 pt-2">
                            <button type="submit" class="btn btn-kursusku btn-lg fw-semibold shadow-sm py-3">
                                Lanjutkan ke Preview Pendaftaran &rarr;
                            </button>
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg py-2 mt-2">
                                Batal dan Kembali ke Beranda
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Ringkasan Praktikum --}}
            <div class="mt-4 p-3 rounded-3 bg-white border text-center text-muted small">
                <strong>Catatan Praktikum Pertemuan 9:</strong> Pengecekan sisa kursi menggunakan <code>jQuery Ajax</code> secara asinkron tanpa reload halaman.
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        const $courseSelect = $('#course_id');
        const $seatWrapper = $('#seat-availability-wrapper');
        const $seatBox = $('#seat-availability-box');
        const $seatSpinner = $('#seat-loading-spinner');
        const $seatMessage = $('#seat-availability-message');

        /**
         * Fungsi untuk memuat ketersediaan kursi menggunakan jQuery Ajax
         */
        function fetchCourseAvailability(courseId) {
            if (!courseId) {
                $seatWrapper.addClass('d-none');
                return;
            }

            // Tampilkan wrapper dan state loading
            $seatWrapper.removeClass('d-none');
            $seatSpinner.removeClass('d-none');
            $seatBox.removeClass('bg-success-subtle border-success text-success bg-danger-subtle border-danger text-danger bg-warning-subtle border-warning text-warning')
                    .addClass('bg-light border-secondary text-secondary');
            $seatMessage.text('Memeriksa ketersediaan kursi via Ajax...');

            // Request Ajax GET ke endpoint ketersediaan
            $.ajax({
                url: "{{ route('courses.availability') }}",
                type: 'GET',
                data: {
                    course_id: courseId
                },
                dataType: 'json',
                success: function(response) {
                    $seatSpinner.addClass('d-none');

                    if (response.success) {
                        // Tampilan berhasil
                        $seatBox.removeClass('bg-light border-secondary text-secondary')
                                .addClass('bg-success-subtle border-success text-success');
                        
                        $seatMessage.html(
                            `<strong>${response.course_name}</strong>: Tersedia <strong>${response.seats} kursi</strong>.`
                        );
                    } else {
                        // Respon tidak berhasil
                        $seatBox.removeClass('bg-light border-secondary text-secondary')
                                .addClass('bg-warning-subtle border-warning text-warning');
                        $seatMessage.text(response.message || 'Ketersediaan kursus tidak ditemukan.');
                    }
                },
                error: function(xhr, status, error) {
                    $seatSpinner.addClass('d-none');
                    // Tampilan error handling
                    $seatBox.removeClass('bg-light border-secondary text-secondary bg-success-subtle')
                            .addClass('bg-danger-subtle border-danger text-danger');
                    
                    $seatMessage.html(
                        '<strong>Gagal memeriksa ketersediaan:</strong> Terjadi kendala saat memuat data dari server.'
                    );
                    
                    console.error('Ajax Availability Error Details:', {
                        status: status,
                        error: error,
                        statusCode: xhr.status,
                        responseText: xhr.responseText
                    });
                }
            });
        }

        // Listener event change pada select kursus
        $courseSelect.on('change', function() {
            const selectedCourseId = $(this).val();
            fetchCourseAvailability(selectedCourseId);
        });

        // Trigger otomatis jika sudah ada nilai sebelumnya (misal setelah validasi submit gagal)
        if ($courseSelect.val()) {
            fetchCourseAvailability($courseSelect.val());
        }
    });
</script>
@endpush

