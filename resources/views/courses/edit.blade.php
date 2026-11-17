@extends('layouts.app')

@section('title', 'Edit Kursus - ' . $course->title)

@section('content')
<div style="margin-bottom: 20px;">
    <h1 style="font-size: 24px; color: #263238;">Edit Kursus</h1>
    <p style="color: #78909c; font-size: 14px;">{{ $course->code }} - {{ $course->title }}</p>
</div>

<div class="table-card" style="padding: 25px;">
    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Kode</label>
            <input type="text" name="code" value="{{ $course->code }}" class="form-control" required>
            @error('code') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Nama</label>
            <input type="text" name="title" value="{{ $course->title }}" class="form-control" required>
            @error('title') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ $course->description }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Instruktur</label>
            <input type="text" name="instructor" value="{{ $course->instructor }}" class="form-control" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 600;">Biaya (Rp)</label>
                <input type="number" name="price" value="{{ $course->price }}" class="form-control" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 600;">Kuota</label>
                <input type="number" name="quota" value="{{ $course->quota }}" class="form-control" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 600;">Tanggal Mulai</label>
                <input type="date" name="start_date" value="{{ $course->start_date?->format('Y-m-d') }}" class="form-control">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 600;">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Open" {{ $course->status == 'Open' ? 'selected' : '' }}>Open</option>
                    <option value="Closed" {{ $course->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                    <option value="Full" {{ $course->status == 'Full' ? 'selected' : '' }}>Full</option>
                </select>
            </div>
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('courses.show', $course->id) }}" class="btn" style="background: #fff; color: #00897b; border: 1px solid #00897b; margin-left: 10px;">Batal</a>
        </div>
    </form>
</div>

<style>
    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #cfd8dc;
        border-radius: 6px;
        font-size: 14px;
        box-sizing: border-box;
    }
    .form-control:focus {
        outline: none;
        border-color: #00897b;
    }
</style>
@endsection