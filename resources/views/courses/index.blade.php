@extends('layouts.app')

@section('title', 'Daftar Courses - KursusKu')
@section('subtitle', 'Database & CRUD II - Pertemuan 11')

@section('content')
<style>
    h1 { color: var(--green-darkest); margin-bottom: 25px; }
    table { width: 100%; border-collapse: collapse; min-width: 900px; }
    th { background: var(--green-dark); color: white; padding: 12px 10px; text-align: left; white-space: nowrap; }
    td { padding: 12px 10px; border-bottom: 1px solid var(--green-light); vertical-align: middle; }
    tr:hover { background: var(--green-light); }
    .nowrap { white-space: nowrap; }
    .badge-kode { background: var(--green-medium); color: white; padding: 6px 12px; border-radius: 8px; font-weight: bold; font-size: 13px; display: inline-block; }
    .deskripsi { font-size: 13px; color: #555; max-width: 400px; display: block; margin-top: 4px; }
    .status-open { background: var(--green-light); color: var(--green-darkest); padding: 5px 14px; border-radius: 20px; font-weight: bold; font-size: 12px; border: 1px solid var(--green-soft); display: inline-block; }
    .status-draft { background: #fff9c4; color: #f57f17; padding: 5px 14px; border-radius: 20px; font-weight: bold; font-size: 12px; border: 1px solid #fff176; display: inline-block; }
    .aksi { display: flex; gap: 6px; flex-wrap: nowrap; }
    .btn { padding: 6px 14px; border: none; border-radius: 6px; font-size: 13px; font-weight: bold; cursor: pointer; text-decoration: none; color: white; white-space: nowrap; display: inline-block; }
    .btn-detail { background: var(--green-dark); }
    .btn-detail:hover { background: var(--green-darkest); }
    .btn-edit { background: var(--green-medium); }
    .btn-edit:hover { background: var(--green); }
    .btn-hapus { background: #d32f2f; }
    .btn-hapus:hover { background: #b71c1c; }
    form { display: inline; }
    .empty { text-align: center; padding: 30px; color: #666; }
    .alert-success { background: var(--green-light); color: var(--green-darkest); padding: 12px 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid var(--green-dark); }
</style>

@if(session('success'))
    <div class="