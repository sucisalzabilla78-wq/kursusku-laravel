<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KursusKu')</title>
    <style>
        :root {
            --green-darkest: #1b5e20;
            --green-dark:    #2e7d32;
            --green:         #43a047;
            --green-medium:  #66bb6a;
            --green-soft:    #81c784;
            --green-light:   #c8e6c9;
            --green-bg:      #e8f5e9;
            --green-card:    #f1f8e9;
            --error:         #d32f2f;
            --error-bg:      #ffebee;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, var(--green-bg) 0%, var(--green-light) 100%);
            min-height: 100vh;
        }

        /* ============ NAVBAR ============ */
        .navbar {
            background: linear-gradient(135deg, var(--green-dark) 0%, var(--green-darkest) 100%);
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(27, 94, 32, 0.3);
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 0;
        }
        .navbar-logo {
            background: white;
            color: var(--green-dark);
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
        }
        .navbar-title {
            color: white;
            font-size: 20px;
            font-weight: bold;
        }
        .navbar-subtitle {
            color: var(--green-light);
            font-size: 12px;
        }
        .navbar-menu {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        .navbar-menu a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.2s;
        }
        .navbar-menu a:hover {
            background: rgba(255,255,255,0.15);
        }
        .navbar-menu a.active {
            background: rgba(255,255,255,0.25);
            font-weight: bold;
        }
        .milestone-badge {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.5);
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            margin-left: 10px;
        }

        /* ============ CONTAINER ============ */
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .card {
            background: var(--green-card);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(27, 94, 32, 0.15);
        }

        @yield('content')
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="navbar-brand">
            <div class="navbar-logo">K</div>
            <div>
                <div class="navbar-title">KursusKu</div>
                <div class="navbar-subtitle">@yield('subtitle', 'Database & CRUD II')</div>
            </div>
        </div>
        <div class="navbar-menu">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ url('/courses') }}">Daftar Kursus</a>
            <a href="{{ url('/courses/create') }}">Tambah Kursus</a>
            <span class="milestone-badge">Milestone 11</span>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>