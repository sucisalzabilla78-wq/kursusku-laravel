@extends('layouts.app')

@section('title', 'Tambah Enrollment')

@section('content')
    <h2>Tambah Enrollment (Admin)</h2>

    <div class="card">
        <form action="{{ route('enrollments.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="participant_id">Participant</label>
                <select name="participant_id" id="participant_id" required>
                    <option value="">-- Pilih Participant --</option>
                    @foreach($participants as $participant)
                        <option value="{{ $participant->id }}">{{ $participant->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="course_id">Course</label>
                <select name="course_id" id="course_id" required>
                    <option value="">-- Pilih Course --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->nama }} ({{ $course->kode }})</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-submit">Simpan Enrollment</button>
        </form>
    </div>
@endsection