@extends('layouts.app')

@section('title', 'Edit Kursus: ' . $course->nama . ' - KursusKu')
@section('subtitle', 'Database & CRUD II - Pertemuan 11')

@section('content')
<style>
    .form-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 35px 40px;
        box-shadow: 0 4px 20px rgba(27, 94, 32, 0.12);
        max-width: 720px;
        margin: 0 auto;
    }
    .form-header {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--green-light);
    }
    .form-header h2 {
        color: var(--green-darkest);
        font-size: 22px;
        margin-bottom: 6px;
    }
    .form-header p {
        color: #777;
        font-size: 13px;
    }
    .form-header p strong {
        color: var(--green-darkest);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }
    .form-group {
        margin-bottom: 18px;
    }
    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--green-darkest);
        margin-bottom: 6px;
        font-size: 13px;
    }
    .form-group label .required {
        color: var(--error);
    }
    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #c8e6c9;
        border-radius: 6px;
        font-size: 14px;
        font-family: inherit;
        background: white;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--green);
        box-shadow: 0 0 0 3px rgba(67, 160, 71, 0.12);
    }
    .form-group textarea {
        min-height: 90px;
        resize: vertical;
    }
    .form-group input[readonly] {
        background: #f5f5f5;
        color: #777;
        cursor: not-allowed;
    }

    .form-group input.is-invalid,
    .form-group textarea.is-invalid,
    .form-group select.is-invalid {
        border-color: #e57373;
        background: #fff5f5;
    }
    .error-message {
        color: #d32f2f;
        font-size: 12px;
        margin-top: 5px;
        display: block;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        justify-content: flex-start;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid var(--green-light);
    }
    .btn {
        padding: 10px 22px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: all 0.2s;
    }
    .btn-primary {
        background: var(--green-dark);
        color: white;
    }
    .btn-primary:hover {
        background: var(--green-darkest);
    }
    .btn-secondary {
        background: transparent;
        color: var(--green-dark);
        border: 1px solid var(--green-soft);
    }
    .btn-secondary:hover {
        background: var(--green-light);
    }
</style>

<div class="form-card">
    <div class="form-header">
        <h2>Edit Data Kursus</h2>
        <p>Perbarui informasi program kursus <strong>{{ $course->nama }}</strong> ({{ $course->kode }}).</p>
    </div>

    <form action="{{ route('courses.update', $course->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        {{-- Baris 1: Kode & Nama --}}
        <div class="form-row">
            <div class="form-group">
                <label>Kode Kursus <span class="required">*</span></label>
                <input 
                    type="text" 
                    name="kode" 
                    value="{{ old('kode', $course->kode) }}" 
                    class="@error('kode') is-invalid @enderror"
                    readonly
                >
                @error('kode')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Nama Kursus <span class="required">*</span></label>
                <input 
                    type="text" 
                    name="nama" 
                    value="{{ old('nama', $course->nama) }}" 
                    class="@error('nama') is-invalid @enderror"
                >
                @error('nama')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Baris 2: Deskripsi --}}
        <div class="form-group">
            <label>Deskripsi Kursus</label>
            <textarea 
                name="deskripsi" 
                class="@error('deskripsi') is-invalid @enderror"
            >{{ old('deskripsi', $course->deskripsi) }}</textarea>
            @error('deskripsi')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        {{-- Baris 3: Biaya & Kuota --}}
        <div class="form-row">
            <div class="form-group">
                <label>Biaya Kursus (Rp) <span class="required">*</span></label>
                <input 
                    type="number" 
                    name="harga" 
                    value="{{ old('harga', $course->harga) }}" 
                    class="@error('harga') is-invalid @enderror"
                    min="0"
                >
                @error('harga')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Kuota Peserta <span class="required">*</span></label>
                <input 
                    type="number" 
                    name="kapasitas" 
                    value="{{ old('kapasitas', $course->kapasitas) }}" 
                    class="@error('kapasitas') is-invalid @enderror"
                    min="1"
                    max="500"
                >
                @error('kapasitas')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Baris 4: Tanggal & Status --}}
        <div class="form-row">
            <div class="form-group">
                <label>Tanggal Mulai <span class="required">*</span></label>
                <input 
                    type="date" 
                    name="tanggal" 
                    value="{{ old('tanggal', $course->tanggal) }}" 
                    class="@error('tanggal') is-invalid @enderror"
                >
                @error('tanggal')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Status Kursus <span class="required">*</span></label>
                <select name="status" class="@error('status') is-invalid @enderror">
                    <option value="open" {{ old('status', $course->status) == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="draft" {{ old('status', $course->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
                @error('status')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Tombol --}}
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-secondary">Batal / Kembali</a>
        </div>
    </form>
</div>
@endsection