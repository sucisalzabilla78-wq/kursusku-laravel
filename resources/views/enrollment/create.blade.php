<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Enrollment - KursusKu</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #d4edda; min-height: 100vh; }
        .navbar { background: #2d3436; color: #fff; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        .navbar .brand { font-size: 22px; font-weight: bold; color: #fff; text-decoration: none; }
        .navbar .nav-links { display: flex; gap: 20px; }
        .navbar .nav-links a { color: #dfe6e9; text-decoration: none; font-size: 14px; }
        .navbar .nav-links a:hover { color: #fff; }
        .container { max-width: 700px; margin: 40px auto; padding: 0 20px; }
        h2 { color: #2d3436; margin-bottom: 20px; font-size: 22px; }
        .card { background: #fff; border-radius: 8px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; margin-bottom: 6px; font-weight: 600; color: #2d3436; font-size: 14px; }
        .form-group select { width: 100%; padding: 10px 12px; border: 1px solid #dfe6e9; border-radius: 5px; font-size: 14px; color: #636e72; background: #fff; }
        .form-group select:focus { outline: none; border-color: #00b894; }
        .btn-submit { width: 100%; padding: 12px; background: #00897b; color: #fff; border: none; border-radius: 5px; font-size: 15px; font-weight: 600; cursor: pointer; }
        .btn-submit:hover { background: #00695c; }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="{{ url('/') }}" class="brand">KursusKu</a>
        <div class="nav-links">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ route('courses.index') }}">Daftar Kursus</a>
            <a href="{{ route('enrollments.index') }}">Pendaftaran</a>
        </div>
    </nav>

    <div class="container">
        <h2>Tambah Enrollment (Admin)</h2>

        <div class="card">
            <form action="{{ route('enrollments.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="participant_id">Participant</label>
                    <select name="participant_id" id="participant_id" required>
                        <option value="">-- Pilih Participant --</option>
                        @foreach($participants as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="course_id">Course</label>
                    <select name="course_id" id="course_id" required>
                        <option value="">-- Pilih Course --</option>
                        @foreach($courses as $c)
                            <option value="{{ $c->id }}">{{ $c->nama }} ({{ $c->kode }})</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn-submit">Simpan Enrollment</button>
            </form>
        </div>
    </div>
</body>
</html>