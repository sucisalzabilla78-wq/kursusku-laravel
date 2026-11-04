@extends('layouts.app')

@section('title', 'Daftar Kursus - KursusKu')

@section('content')
<div class="container py-5">
    {{-- Header Section --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill fw-semibold mb-2">
                Database & CRUD Tahap 1 (Create &amp; Read)
            </span>
            <h1 class="h2 fw-bold text-dark mt-2 mb-1">Daftar Kursus Pemrograman</h1>
            <p class="text-muted mb-0">
                Data program kursus yang tersimpan di dalam database sistem KursusKu.
            </p>
        </div>
        <div>
            <a href="{{ route('courses.create') }}" class="btn btn-kursusku px-4 py-2 shadow-sm d-inline-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
                <span>Tambah Kursus Baru</span>
            </a>
        </div>
    </div>

    {{-- Alert Notifikasi Sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
            <div class="d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill text-success" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Card Tabel Kursus --}}
    <div class="card card-kursusku border-0 shadow-sm bg-white overflow-hidden">
        <div class="card-header bg-white border-bottom py-3 px-4 d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <span>Katalog Kursus Terdaftar</span>
                @if ($courses instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <span class="badge bg-secondary bg-opacity-10 text-secondary border rounded-pill small">
                        {{ $courses->total() }} Data
                    </span>
                @else
                    <span class="badge bg-secondary bg-opacity-10 text-secondary border rounded-pill small">
                        {{ $courses->count() }} Data
                    </span>
                @endif
            </h5>
            <span class="text-muted small">Tabel `courses`</span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary small text-uppercase">
                    <tr>
                        <th scope="col" class="ps-4" style="width: 60px;">No</th>
                        <th scope="col" style="width: 120px;">Kode</th>
                        <th scope="col">Nama Kursus &amp; Deskripsi</th>
                        <th scope="col" style="width: 150px;">Biaya</th>
                        <th scope="col" style="width: 110px;">Kuota</th>
                        <th scope="col" style="width: 140px;">Mulai</th>
                        <th scope="col" class="pe-4 text-center" style="width: 100px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td class="ps-4 text-muted fw-semibold">
                                @if ($courses instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{ $courses->firstItem() + $loop->index }}
                                @else
                                    {{ $loop->iteration }}
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border font-monospace px-2 py-1">
                                    {{ $course->code }}
                                </span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $course->name }}</div>
                                @if ($course->description)
                                    <div class="small text-muted text-truncate" style="max-width: 420px;" title="{{ $course->description }}">
                                        {{ $course->description }}
                                    </div>
                                @else
                                    <span class="small text-muted fst-italic">- Tidak ada deskripsi -</span>
                                @endif
                            </td>
                            <td>
                                @if ($course->fee == 0)
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1 fw-semibold">
                                        Gratis
                                    </span>
                                @else
                                    <span class="fw-semibold text-dark">
                                        Rp {{ number_format($course->fee, 0, ',', '.') }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-info bg-opacity-10 text-info-emphasis border border-info border-opacity-25 px-2 py-1">
                                    {{ $course->quota }} Kursi
                                </span>
                            </td>
                            <td class="small text-secondary">
                                {{ $course->start_date ? \Carbon\Carbon::parse($course->start_date)->translatedFormat('d M Y') : '-' }}
                            </td>
                            <td class="pe-4 text-center">
                                @if ($course->status === 'open')
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1 rounded-pill">
                                        Open
                                    </span>
                                @elseif ($course->status === 'draft')
                                    <span class="badge bg-warning bg-opacity-10 text-warning-emphasis border border-warning border-opacity-25 px-2 py-1 rounded-pill">
                                        Draft
                                    </span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 px-2 py-1 rounded-pill">
                                        Closed
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <div class="py-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-inbox text-secondary opacity-50 mb-3" viewBox="0 0 16 16">
                                        <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a1 1 0 0 1 .109 1.03l-.64 5.124A1.5 1.5 0 0 1 13.864 16H2.136a1.5 1.5 0 0 1-1.496-1.658l-.64-5.124a1 1 0 0 1 .11-1.03z"/>
                                    </svg>
                                    <h5 class="fw-bold text-dark">Belum Ada Data Kursus</h5>
                                    <p class="text-muted small mb-3">
                                        Data kursus di database masih kosong. Silakan tambahkan kursus baru atau jalankan seeder.
                                    </p>
                                    <a href="{{ route('courses.create') }}" class="btn btn-sm btn-kursusku px-3">
                                        Tambah Kursus Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($courses instanceof \Illuminate\Pagination\LengthAwarePaginator && $courses->hasPages())
            <div class="card-footer bg-white border-top py-3 px-4">
                {{ $courses->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

