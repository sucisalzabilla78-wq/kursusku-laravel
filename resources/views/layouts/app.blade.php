<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KursusKu')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: #e8f5e9; 
            color: #333;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar { 
            background: #263238; 
            padding: 15px 30px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        }
        .navbar .logo { 
            color: #fff; 
            font-size: 22px; 
            font-weight: bold; 
            text-decoration: none; 
        }
        .navbar nav a { 
            color: #cfd8dc; 
            text-decoration: none; 
            margin-left: 20px; 
            font-size: 15px; 
        }
        .navbar nav a:hover { color: #fff; }

        /* Container */
        .container { 
            max-width: 1000px; 
            margin: 30px auto; 
            padding: 0 20px; 
        }

        /* Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .page-header h1 {
            font-size: 24px;
            color: #263238;
        }

        /* Button */
        .btn { 
            display: inline-block; 
            padding: 10px 20px; 
            border-radius: 6px; 
            text-decoration: none; 
            font-size: 14px; 
            font-weight: 600; 
            border: none; 
            cursor: pointer; 
        }
        .btn-primary { 
            background: #00897b; 
            color: white; 
        }
        .btn-primary:hover { background: #00695c; }

        /* Alert */
        .alert { 
            padding: 12px 20px; 
            border-radius: 6px; 
            margin-bottom: 20px; 
            font-size: 14px; 
        }
        .alert-success { 
            background: #e8f5e9; 
            color: #2e7d32; 
            border: 1px solid #a5d6a7; 
        }

        /* Table */
        .table-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
        }
        th, td { 
            padding: 12px 16px; 
            text-align: left; 
            border-bottom: 1px solid #e0e0e0; 
        }
        th { 
            background: #00897b; 
            color: white; 
            font-weight: 600; 
        }
        tr:last-child td { border-bottom: none; }
        tr:hover { background: #f5f5f5; }

        /* Badge */
        .badge { 
            padding: 4px 12px; 
            border-radius: 12px; 
            font-size: 12px; 
            font-weight: 600; 
            display: inline-block; 
        }
        .badge.registered { background: #e0f2f1; color: #00695c; }
        .badge.active { background: #e8f5e9; color: #2e7d32; }
        .badge.pending { background: #fff8e1; color: #f57f17; }
        .badge.completed { background: #e3f2fd; color: #1565c0; }
        .badge.cancelled { background: #ffebee; color: #c62828; }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="/" class="logo">KursusKu</a>
        <nav>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('courses.index') }}">Daftar Kursus</a>
            <a href="{{ route('enrollment.index') }}">Pendaftaran</a>
        </nav>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>