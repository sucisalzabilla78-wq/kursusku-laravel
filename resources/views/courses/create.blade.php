@extends('layouts.app')

@section('title', 'Tambah Kursus Baru - KursusKu')
@section('subtitle', 'Database & CRUD II - Pertemuan 11')

@section('content')
<style>
    .form-header {
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--green-light);
    }
    .form-header h2 {
        color: var(--green-darkest);
        font-size: 24px;
        margin-bottom: 8px;
    }
    .form-header p {
        color: #666;
        font-size: 14px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--green-darkest);
        margin-bottom: 8px;
        font-size: 14px;
    }
    .form-group label .required {
        color: var(--error);
    }
    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid var(--green-soft);
        border-radius: 8px;
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
        box-shadow: 0 0 0 3px rgba(67, 160, 71, 0.15);
    }
    .form-group textarea {
        min-height: 100px;
        resize: vertical;
    }

    /* Error styling */
    .form-group input.is-invalid,
    .form-group textarea.is-invalid {
        border-color: var(--error);
        background: var(--error-bg);
    }
    .error-message {
        color: var(--error);
        font-size: 13px;
        margin-top: 6px;
        display: block;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid var(--green-light);
    }
    .btn {
        padding: 10px 24px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: bold;
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
        background: #e0e0e0;
        color: #333;
    }
    .btn-secondary:hover {
        background: #bdbdbd;
    }
</style>

<div class="card">
    <div class="form-header">
        <h2>Tambah Kursus Baru</h2>
        <p>Isi formulir di bawah ini untuk menambahkan data program kursus baru ke sistem.</p>
    </div>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <label>Kode Kursus <span class="required">*</span></label>
                <input 
                    type="text" 
                    name="kode" 
                    value="{{ old('kode') }}" 
                    class="@error('kode') is-invalid @enderror"
                    placeholder="Contoh: WEB-02"
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
                    value="{{ old('nama') }}" 
                    class="@error('nama') is-invalid @enderror"
                    placeholder="Contoh: Web Dasar"
                >
                @error('nama')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Deskripsi Kursus</label>
            <textarea 
                name="deskripsi" 
                class="@error('deskripsi') is-invalid @enderror"
                placeholder="Deskripsi singkat tentang kursus..."
            >{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Biaya Kursus (Rp)</label>
                <input 
                    type="number" 
                    name="harga" 
                    value="{{ old('harga', 0) }}" 
                    class="@error('harga') is-invalid @enderror"
                    min="0"
                >
                @error('harga')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Kuota Peserta</label>
                <input 
                    type="number" 
                    name="kapasitas" 
                    value="{{ old('kapasitas', 10) }}" 
                    class="@error('kapasitas') is-invalid @enderror"
                    min="1"
                >
                @error('kapasitas')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input 
                    type="date" 
                    name="tanggal" 
                    value="{{ old('tanggal') }}" 
                    class="@error('tanggal') is-invalid @enderror"
                >
                @error('tanggal')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="@error('status') is-invalid @enderror">
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open</option>
                </select>
                @error('status')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ url('/courses') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Kursus</button>
        </div>
    </form>
</div>
@endsection