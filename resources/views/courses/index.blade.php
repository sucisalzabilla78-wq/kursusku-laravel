@extends('layouts.app')

@section('title', 'Daftar Kursus - KursusKu')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <div>
        <h1 style="font-size: 24px; color: #263238; margin-bottom: 5px;">Daftar Kursus</h1>
        <p style="color: #78909c; font-size: 14px;">Data diambil dari MySQL melalui Eloquent.</p>
    </div>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">+ Tambah Kursus</a>
</div>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Biaya</th>
                <th>Kuota</th>
                <th>Mulai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
            <tr>
                <td>{{ $course->code }}</td>
                <td>{{ $course->title }}</td>
                <td>Rp {{ number_format($course->price, 0, ',', '.') }}</td>
                <td>{{ $course->quota }}</td>
                <td>{{ $course->start_date ? $course->start_date->format('d/m/Y') : '-' }}</td>
                <td>
                    <span class="badge {{ strtolower($course->status) }}">{{ $course->status }}</span>
                </td>
                <td style="display: flex; gap: 5px;">
                    <a href="{{ route('courses.show', $course->id) }}" class="btn-action btn-detail">Detail</a>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn-action btn-edit">Edit</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; color: #888;">Belum ada kursus.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
    .btn-action {
        padding: 6px 14px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        border: 1px solid;
        cursor: pointer;
        background: #fff;
    }
    .btn-detail {
        color: #00897b;
        border-color: #00897b;
    }
    .btn-detail:hover {
        background: #00897b;
        color: #fff;
    }
    .btn-edit {
        color: #f57f17;
        border-color: #f57f17;
    }
    .btn-edit:hover {
        background: #f57f17;
        color: #fff;
    }
    .btn-delete {
        color: #c62828;
        border-color: #c62828;
    }
    .btn-delete:hover {
        background: #c62828;
        color: #fff;
    }
    .badge {
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
    }
    .badge.open { background: #e8f5e9; color: #2e7d32; }
    .badge.closed { background: #ffebee; color: #c62828; }
    .badge.full { background: #fff8e1; color: #f57f17; }
    .badge.draft { background: #f5f5f5; color: #616161; }
</style>
@endsection