<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus - KursusKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Warna Hijau */
        .bg-hijau { background-color: #28a745 !important; }
        .btn-hijau { background-color: #28a745; color: white; border: none; }
        .btn-hijau:hover { background-color: #218838; color: white; }
        .text-hijau { color: #28a745; }
        .table-header-hijau { background-color: #28a745 !important; color: white !important; }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar Hijau -->
    <nav class="navbar navbar-dark bg-hijau">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">KursusKu</a>
            <div class="d-flex">
                <a href="{{ url('/') }}" class="nav-link text-white me-3">Beranda</a>
                <a href="#" class="nav-link text-white">Pendaftaran</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Judul dan Tombol Tambah -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-hijau">Daftar Kursus</h2>
            <a href="{{ route('courses.create') }}" class="btn btn-hijau">+ Tambah Kursus</a>
        </div>

        <!-- Form Pencarian dan Filter -->
        <form method="GET" action="{{ route('courses.index') }}" class="row g-2 mb-4">
            <div class="col-md-6">
                <input type="search" name="q" value="{{ $search }}" class="form-control" placeholder="Cari kode atau nama kursus">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">Semua status</option>
                    <option value="open" @selected($status === 'open')>Open</option>
                    <option value="closed" @selected($status === 'closed')>Closed</option>
                    <option value="draft" @selected($status === 'draft')>Draft</option>
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-hijau flex-fill">Cari</button>
                <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>

        <!-- Tabel Data Kursus -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white">
                <thead class="table-header-hijau">
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 15%;">Kode</th>
                        <th style="width: 30%;">Nama Kursus</th>
                        <th style="width: 15%;">Fee</th>
                        <th style="width: 15%;">Status</th>
                        <th style="width: 20%;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $index => $course)
                        <tr>
                            <td>{{ $courses->firstItem() + $index }}</td>
                            <td class="fw-bold">{{ $course->code }}</td>
                            <td>{{ $course->title }}</td>
                            <td>Rp {{ number_format($course->price, 0, ',', '.') }}</td>
                            <td>
                                @if($course->status == 'open')
                                    <span class="badge bg-success">Open</span>
                                @elseif($course->status == 'closed')
                                    <span class="badge bg-danger">Closed</span>
                                @else
                                    <span class="badge bg-warning text-dark">Draft</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Tidak ada kursus yang sesuai dengan pencarian atau filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $courses->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>