@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <h2>🎓 Selamat Datang di KursusKu</h2>
    <div class="card" style="text-align:center; padding: 40px;">
        <p style="font-size:18px; color:#636e72; margin-bottom:20px;">
            Sistem Manajemen Kursus & Pendaftaran
        </p>
        <a href="{{ route('courses.index') }}" class="btn">📚 Daftar Kursus</a>
        <a href="{{ route('enrollments.index') }}" class="btn">📋 Data Pendaftaran</a>
    </div>
@endsection