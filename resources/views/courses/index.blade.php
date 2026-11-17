@extends('layouts.app')

@section('title', 'Pendaftaran')

@section('content')
    <h2>📋 Data Pendaftaran</h2>

    <a href="{{ route('enrollments.create') }}" class="btn">+ Tambah Enrollment</a>

    @if(isset($enrollments) && $enrollments->count() > 0)
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Participant</th>
                <th>Course</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $index => $enrollment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $enrollment->participant->nama ?? '-' }}</td>
                <td>{{ $enrollment->course->nama ?? '-' }}</td>
                <td>{{ $enrollment->tanggal_daftar ?? '-' }}</td>
                <td>
                    <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="empty">
        <p>📭 Belum ada data pendaftaran.</p>
    </div>
    @endif
@endsection