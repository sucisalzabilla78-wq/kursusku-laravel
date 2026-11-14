@extends('layouts.app')

@section('title', $course->nama . ' - KursusKu')
@section('subtitle', 'Database & CRUD II - Pertemuan 11')

@section('content')
<style>
    .detail-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 35px 40px;
        box-shadow: 0 4px 20px rgba(27, 94, 32, 0.12);
        max-width: 720px;
        margin: 0 auto;
    }

    /* ===== HEADER: Badge Kode + Status ===== */
    .detail-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
    }
    .badge-kode {
        background: var(--green-light);
        color: var(--green-darkest);
        padding: 5px 14px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: bold;
        border: 1px solid var(--green-soft);
    }
    .badge-status {
        padding: 5px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        border: 1px solid;
    }
    .badge-status.open {
        background: var(--green-light);
        color: var(--green-darkest);
        border-color: var(--green-soft);
    }
    .badge-status.draft {
        background: #fff9c4;
        color: #f57f17;
        border-color: #fff176;
    }

    /* ===== JUDUL ===== */
    .detail-title {
        color: var(--green-darkest);
        font-size: 26px;
        font-weight: bold;
        margin: 0 0 25px 0;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--green-light);
    }

    /* ===== GRID INFO 2x2 ===== */
    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-bottom: 20px;
    }
    .info-box {
        background: var(--green-bg);
        border: 1px solid var(--green-light);
        border-radius: 8px;
        padding: 15px 18px;
    }
    .info-label {
        font-size: 11px;
        font-weight: 700;
        color: #888;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
    }
    .info-value {
        font-size: 16px;
        font-weight: bold;
        color: var(--green-darkest);
    }

    /* ===== DESKRIPSI ===== */
    .desc-box {
        background: var(--green-bg);
        border: 1px solid var(--green-light);
        border-radius: 8px;
        padding: 15px 18px;
        margin-bottom: 25px;
    }
    .desc-box .info-label {
        margin-bottom: 8px;
    }
    .desc-box .info-value {
        font-size: 14px;
        font-weight: normal;
        color: #444;
        line-height: 1.6;
    }

    /* ===== FOOTER ACTIONS ===== */
    .detail-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 20px;
        border-top: 1px solid var(--green-light);
    }
    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
    }
    .btn-back {
        background: transparent;
        color: var(--green-dark);
        border: 1px solid var(--green-soft);
    }
    .btn-back:hover {
        background: var(--green-light);
    }
    .btn-edit {
        background: #f57c00;
        color: white;
    }
    .btn-edit:hover {
        background: #e65100;
    }
    .btn-delete {
        background: #d32f2f;
        color: white;
    }
    .btn-delete:hover {
        background: #b71c1c;
    }
    .footer-right {
        display: flex;
        gap: 10px;
    }
    form { display: inline; }
</style>

<div class="detail-card">

    {{-- Baris 1: Badge Kode (kiri) + Status (kanan) --}}
    <div class="detail-top">
        <span class="badge-kode">{{ $course->kode }}</span>
        <span class="badge-status {{ $course->status }}">
            STATUS: {{ strtoupper($course->status) }}
        </span>
    </div>

    {{-- Baris 2: Judul --}}
    <h1 class="detail-title">{{ $course->nama }}</h1>

    {{-- Baris 3: Grid Info 2x2 --}}
    <div class="info-grid">
        <div class="info-box">
            <div class="info-label">Kode Kursus</div>
            <div class="info-value">{{ $course->kode }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Bi