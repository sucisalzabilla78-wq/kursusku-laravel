@extends('layouts.app')

@section('title', 'Detail Kursus - ' . $course->title)

@section('content')
<div style="margin-bottom: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h1 style="font-size: 24px; color: #263238; margin-bottom: 5px;">Detail Kursus</h1>
            <p style="color: #78909c; font-size: 14px;">{{ $course->code }} - {{ $course->title }}</p>
        </div>
        <div>
            <a href="{{ url()->previous() }}" class="btn" style="background: #fff; color: #00897b; border: 1px solid #00897b; margin-right: 10px;">Kembali</a>
            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>

<div class="table-card" style="padding: 25px;">
    <table style="border: none;">
        <tbody>
            <tr>
                <td style="width: 200px; font-weight: 600; padding: 10px 16px;">Kode</td>
                <td style="padding: 10px 16px;">{{ $course->code }}</td>
            </tr>
            <tr>
                <td style="font-weight: 600; padding: 10px 16px;">Nama</td>
                <td style="padding: 10px 16px;">{{ $course->title }}</td>
            </tr>
            <tr>
                <td style="font-weight: 600; padding: 10px 16px;">Deskripsi</td>
                <td style="padding: 10px 16px;">{{ $course->description ?? '-' }}</td>
            </tr>
            <tr>
                <td style="font-weight: 600; padding: 10px 16px;">Biaya</td>
                <td style="padding: 10px 16px;">Rp {{ number_format($course->price, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td style="font-weight: 600; padding: 10px 16px;">Kuota</td>
                <td style="padding: 10px 16px;">{{ $course->quota }} peserta</td>
            </tr>
            <tr>
                <td style="font-weight: 600; padding: 10px 16px;">Tanggal Mulai</td>
                <td style="padding: 10px 16px;">{{ $course->start_date ? $course->start_date->format('d-m-Y') : '-' }}</td>
            </tr>
            <tr>
                <td style="font-weight: 600; padding: 10px 16px;">Status</td>
                <td style="padding: 10px 16px;">{{ $course->status }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection