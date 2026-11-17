@extends('layouts.app')

@section('title', 'Laporan Enrollment - KursusKu')

@section('content')
<div class="page-header">
    <h1>Laporan Enrollment KursusKu</h1>
    <a href="{{ route('enrollment.create') }}" class="btn btn-primary">+ Tambah Enrollment</a>
</div>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>Participant</th>
                <th>Course</th>
                <th>Start Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($enrollments as $enrollment)
            <tr>
                <td>{{ $enrollment->participant->name }}</td>
                <td>{{ $enrollment->course->title }}</td>
                <td>{{ $enrollment->created_at ? $enrollment->created_at->format('d/m/Y') : '-' }}</td>
                <td><span class="badge {{ $enrollment->status }}">{{ $enrollment->status }}</span></td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align:center; color:#888;">Belum ada enrollment.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection