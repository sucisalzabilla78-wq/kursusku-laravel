@extends('layouts.app')

@section('title', 'Tambah Kursus Baru - KursusKu')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            {{-- Breadcrumb / Back Link --}}
            <div class="mb-3">
                <a href="{{ route('courses.index') }}" class="text-decoration-none text-secondary d-inline-flex align-items-center gap-1 small fw-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg>
                    <span>Kembali ke Daftar Kursus</span>
                </a>
            </div>

            {{-- Header Form --}}
            <div class="text-center mb-4">
                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill fw-semibold mb-2">
                    Formulir Input Data Baru
                </span>
                <h1 class="h2 fw-bold text-dark mt-2">Tambah Kursus Baru</h1>
                <p class="text-muted">
                    Lengkapi formulir di bawah ini untuk menambahkan program kursus baru ke database.
                </p>
            </div>

            {{-- Alert Error Validasi Global --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <strong>Perhatian:</strong> Terdapat data input yang belum valid:
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
                    <form action="{{ route('courses.store') }}" method="POST" id="createCourseForm" novalidate>
                        @csrf

                        {{-- Input Kode Kursus & Nama Kursus --}}
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="code" class="form-label fw-semibold text-secondary">
                                    Kode Kursus <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control form-control-lg text-uppercase font-monospace @error('code') is-invalid @enderror" 
                                    id="code" 
                                    name="code" 
                                    value="{{ old('code') }}" 
                                    placeholder="Contoh: LAR-02" 
                                    maxlength="20"
                                    required
                                >
                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-text text-muted">
                                    Maksimal 20 karakter unik.
                                </div>
                            </div>

                            <div class="col-md-8 mb-4">
                                <label for="name" class="form-label fw-semibold text-secondary">
                                    Nama Kursus <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    placeholder="Contoh: Pemrograman Web Lanjut dengan Laravel" 
                                    maxlength="120"
                                    required
                                >
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-text text-muted">
                                    Nama program kursus (3 - 120 karakter).
                                </div>
                            </div>
                        </div>

                        {{-- Input Deskripsi Kursus --}}
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold text-secondary">
                                Deskripsi Kursus
                            </label>
                            <textarea 
                                class="form-control @error('description') is-invalid @enderror" 
                                id="description" 
                                name="description" 
                                rows="3" 
                                placeholder="Jelaskan ringkasan materi, capaian pembelajaran, atau prasyarat kursus..."
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text text-muted">
                                Opsional. Dapat dikosongkan bila belum ada penjelasan rinci.
                            </div>
                        </div>

                        {{-- Row Biaya & Kuota --}}
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="fee" class="form-label fw-semibold text-secondary">
                                    Biaya Kursus (Rp) <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light text-secondary">Rp</span>
                                    <input 
                                        type="number" 
                                        class="form-control @error('fee') is-invalid @enderror" 
                                        id="fee" 
                                        name="fee" 
                                        value="{{ old('fee', 0) }}" 
                                        min="0"
                                        step="1000"
                                        placeholder="0"
                                        required
                                    >
                                    @error('fee')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-text text-muted">
                                    Isi 0 untuk program kursus gratis.
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="quota" class="form-label fw-semibold text-secondary">
                                    Kuota Peserta <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="number" 
                                    class="form-control form-control-lg @error('quota') is-invalid @enderror" 
                                    id="quota" 
                                    name="quota" 
                                    value="{{ old('quota', 20) }}" 
                                    min="1"
                                    placeholder="20"
                                    required
                                >
                                @error('quota')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-text text-muted">
                                    Kapasitas maksimal siswa per kelas.
                                </div>
                            </div>
                        </div>

                        {{-- Row Tanggal Mulai & Status --}}
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="start_date" class="form-label fw-semibold text-secondary">
                                    Tanggal Mulai <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="date" 
                                    class="form-control form-control-lg @error('start_date') is-invalid @enderror" 
                                    id="start_date" 
                                    name="start_date" 
                                    value="{{ old('start_date') }}" 
                                    required
                                >
                                @error('start_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-text text-muted">
                                    Tanggal dimulainya sesi pembelajaran perdana.
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="status" class="form-label fw-semibold text-secondary">
                                    Status Kursus <span class="text-danger">*</span>
                                </label>
                                <select 
                                    class="form-select form-select-lg @error('status') is-invalid @enderror" 
                                    id="status" 
                                    name="status" 
                                    required
                                >
                                    <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>
                                        Draft (Penyusunan)
                                    </option>
                                    <option value="open" {{ old('status') === 'open' ? 'selected' : '' }}>
                                        Open (Pendaftaran Dibuka)
                                    </option>
                                    <option value="closed" {{ old('status') === 'closed' ? 'selected' : '' }}>
                                        Closed (Pendaftaran Ditutup)
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-text text-muted">
                                    Tentukan status ketersediaan kursus.
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="d-flex flex-column flex-sm-row justify-content-end gap-3 mt-4 pt-3 border-top">
                            <a href="{{ route('courses.index') }}" class="btn btn-light btn-lg px-4 text-secondary">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-kursusku btn-lg px-5 shadow-sm fw-semibold">
                                Simpan Kursus
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

