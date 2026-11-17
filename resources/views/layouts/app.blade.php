<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SER-VICE')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --bg: #101114;
            --card: #191B20;
            --accent: #F5E600;
            --text: #FFFFFF;
            --muted: #A0A0A0;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: var(--card);
            position: fixed;
            padding: 25px 18px;
            border-right: 1px solid #292929;
        }

        .brand {
            color: var(--accent);
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .nav-link {
            color: #C7C7C7;
            padding: 13px 15px;
            border-radius: 8px;
            margin-bottom: 8px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: var(--accent);
            color: #111;
            font-weight: bold;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            background: var(--card);
            padding: 18px 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-card {
            background: var(--card);
            border: 1px solid #292929;
            border-radius: 12px;
            padding: 25px;
        }

        .btn-accent {
            background: var(--accent);
            color: #111;
            font-weight: bold;
            border: none;
        }

        .btn-accent:hover {
            background: #d9cb00;
            color: #111;
        }

        .form-control,
        .form-select {
            background: #101114;
            color: white;
            border: 1px solid #383838;
        }

        .form-control:focus,
        .form-select:focus {
            background: #101114;
            color: white;
            border-color: var(--accent);
            box-shadow: none;
        }

        .form-control::placeholder {
            color: #777;
        }

        .table {
            color: white;
            vertical-align: middle;
        }

        .table thead th {
            background: #25272D;
            color: var(--accent);
            border-color: #383838;
        }

        .table td {
            background: var(--card);
            color: white;
            border-color: #383838;
        }

        .text-muted {
            color: var(--muted) !important;
        }

        @media(max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main-content {
                margin-left: 0;
                padding: 15px;
            }
        }
    
        /* TOMBOL SIMPAN */
        .btn-yellow,
        .btn-warning,
        button[type="submit"].btn {
            background-color: #198754 !important;
            color: #FFFFFF !important;
            border: 1px solid #198754 !important;
            font-weight: 700;
            transition: .2s ease;
        }

        .btn-yellow:hover,
        .btn-warning:hover,
        button[type="submit"].btn:hover {
            background-color: #146C43 !important;
            color: #FFFFFF !important;
            border-color: #146C43 !important;
        }

        /* TOMBOL BATAL DAN KEMBALI */
        .btn-secondary,
        .btn-outline-light {
            background-color: #DC3545 !important;
            color: #FFFFFF !important;
            border: 1px solid #DC3545 !important;
            font-weight: 700;
            transition: .2s ease;
        }

        .btn-secondary:hover,
        .btn-outline-light:hover {
            background-color: #B02A37 !important;
            color: #FFFFFF !important;
            border-color: #B02A37 !important;
        }
    </style>

    @stack('styles')
</head>

<body>

@if(auth()->check() && !request()->routeIs('home') && !request()->routeIs('pelanggan.*') && !request()->routeIs('daftar-service.*') && !request()->routeIs('data-service.*') && !request()->routeIs('pembayaran.*'))
<div class="sidebar">
    <div class="brand">SER-VICE</div>

    <nav class="nav flex-column">
        <a href="{{ route('home') }}" class="nav-link">Home</a>

        <a href="{{ route('pelanggan.index') }}"
           class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
            Data Pelanggan & Kendaraan
        </a>

        <a href="{{ route('daftar-service.index') }}"
           class="nav-link {{ request()->routeIs('daftar-service.*') ? 'active' : '' }}">
            Daftar Service
        </a>

        <a href="{{ route('data-service.index') }}"
           class="nav-link {{ request()->routeIs('data-service.*') ? 'active' : '' }}">
            Data Service
        </a>

        <a href="{{ route('pembayaran.index') }}"
           class="nav-link {{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">
            Pembayaran
        </a>
    </nav>
</div>
@endif

<div class="{{ auth()->check() && !request()->routeIs('home') && !request()->routeIs('pelanggan.*') && !request()->routeIs('daftar-service.*') && !request()->routeIs('data-service.*') && !request()->routeIs('pembayaran.*') ? 'main-content' : '' }}">
    @if(auth()->check() && !request()->routeIs('home') && !request()->routeIs('pelanggan.*') && !request()->routeIs('daftar-service.*') && !request()->routeIs('data-service.*') && !request()->routeIs('pembayaran.*'))
        <div class="topbar">
            <h5 class="mb-0">@yield('page-title', 'Dashboard')</h5>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-warning btn-sm">
                    Logout
                </button>
            </form>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.alert-success').forEach(function (alert) {
        setTimeout(function () {
            bootstrap.Alert.getOrCreateInstance(alert).close();
        }, 3000);
    });
});
</script>
@stack('scripts')

</body>
</html>






