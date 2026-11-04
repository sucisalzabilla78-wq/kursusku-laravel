@extends('layouts.app')

@section('title', 'Preview Pendaftaran Kursus - KursusKu')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            {{-- Header Preview --}}
            <div class="text-center mb-4">
                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 rounded-pill fw-semibold mb-2">
                    Tahap Konfirmasi Data
                </span>
                <h1 class="h2 fw-bold text-dark mt-2">Preview Pendaftaran Kursus</h1>
                <p class="text-muted">
                    Data pendaftaran Anda telah berhasil divalidasi. Silakan periksa kembali rincian di bawah ini.
                </p>
            </div>

            {{-- Card Ringkasan Pendaftaran --}}
            <div class="card card-kursusku shadow-sm bg-white border-0">
                <div class="card-body p-4 p-md-5">

                    <div class="alert alert-success d-flex align-items-center gap-3 mb-4" role="alert">
                        <span class="fs-4 text-success">&#10003;</span>
                        <div>
                            <strong>Validasi Berhasil!</strong> Seluruh isian form telah memenuhi kriteria validasi Laravel.
                        </div>
                    </div>

                    <h5 class="fw-bold text-secondary mb-3 border-bottom pb-2">Rincian Data Calon Siswa</h5>

                    <table class="table table-bordered mb-4">
                        <tbody>
                            <tr>
                                <th class="bg-light text-secondary" style="width: 35%;">Nama Lengkap</th>
                                <td class="fw-semibold text-dark">{{ $data['nama'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">Alamat Email</th>
                                <td class="text-dark">{{ $data['email'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">Kursus yang Dipilih</th>
                                <td>
                                    <span class="badge bg-kursusku fs-6 px-3 py-2 text-white">
                                        {{ $course['name'] }} ({{ $course['id'] }})
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">Ketersediaan Kursi</th>
                                <td>
                                    <span class="text-success fw-bold">{{ $course['seats'] }} kursi tersedia</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">Deskripsi Kursus</th>
                                <td class="text-muted small">{{ $course['description'] }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="d-flex flex-column flex-sm-row justify-content-between gap-3 pt-3">
                        <a href="{{ route('enrollment.create') }}" class="btn btn-outline-secondary px-4 py-2">
                            &larr; Ubah Data Pendaftaran
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-kursusku px-4 py-2">
                            Kembali ke Halaman Beranda
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

