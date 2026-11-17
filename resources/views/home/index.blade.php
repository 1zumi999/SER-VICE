@extends('layouts.app')

@section('title', 'Home - SER-VICE')

@section('content')
<div class="home-page">

    {{-- HEADER --}}
    <header class="home-header">
        <a href="{{ route('home') }}" class="home-brand">
            <div class="brand-icon">S</div>
            <div>
                <h3>SER-VICE</h3>
                <span>MOTORCYCLE SERVICE</span>
            </div>
        </a>

        <div class="header-space"></div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                Logout <span>↗</span>
            </button>
        </form>
    </header>

    {{-- WELCOME --}}
    <main class="home-main">

        <section class="welcome-frame">
            <div class="welcome-line"></div>
            <p>WELCOME TO</p>
            <h1>SER-<span>VICE</span></h1>
            <div class="welcome-line"></div>
        </section>

        {{-- MENU --}}
        <section class="menu-grid">

            <a href="{{ route('pelanggan.index') }}" class="menu-card">
                <div class="menu-icon">♙</div>
                <div class="menu-number">01</div>
                <h4>Pelanggan</h4>
                <span>Data Pelanggan & Kendaraan</span>
                <div class="menu-arrow">↗</div>
            </a>

            <a href="{{ route('daftar-service.index') }}" class="menu-card">
                <div class="menu-icon">▤</div>
                <div class="menu-number">02</div>
                <h4>Daftar Service</h4>
                <span>Pendaftaran Service</span>
                <div class="menu-arrow">↗</div>
            </a>

            <a href="{{ route('data-service.index') }}" class="menu-card">
                <div class="menu-icon">⚙</div>
                <div class="menu-number">03</div>
                <h4>Data Service</h4>
                <span>Pengelolaan Pengerjaan</span>
                <div class="menu-arrow">↗</div>
            </a>

            <a href="{{ route('pembayaran.index') }}" class="menu-card">
                <div class="menu-icon">▣</div>
                <div class="menu-number">04</div>
                <h4>Pembayaran</h4>
                <span>Transaksi dan Rekap</span>
                <div class="menu-arrow">↗</div>
            </a>

        </section>

        <footer class="home-footer">
            SER-VICE <span>©</span> MOTORCYCLE SERVICE MANAGEMENT
        </footer>

    </main>
</div>
@endsection

@push('styles')
<style>
    body {
        background:
            radial-gradient(ellipse at 50% 45%, #202127 0%, #101114 65%);
        min-height: 100vh;
    }

    .home-page {
        min-height: 100vh;
        padding: 22px 35px;
    }

    /* HEADER */
    .home-header {
        width: 100%;
        min-height: 85px;
        background: #191B20;
        border: 1px solid #303239;
        border-radius: 15px;
        padding: 15px 25px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 8px 30px rgba(0,0,0,.2);
    }

    .home-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
        color: white;
    }

    .brand-icon {
        width: 46px;
        height: 46px;
        display: grid;
        place-items: center;
        background: #F5E600;
        color: #101114;
        border-radius: 10px;
        font-size: 26px;
        font-weight: 900;
    }

    .home-brand h3 {
        margin: 0;
        font-weight: 900;
        letter-spacing: 1px;
        font-size: 21px;
    }

    .home-brand span {
        font-size: 9px;
        color: #999;
        letter-spacing: 2px;
    }

    .header-space {
        flex: 1;
    }

    .logout-btn {
        background: transparent;
        color: #F5E600;
        border: 1px solid #F5E600;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        transition: .25s;
    }

    .logout-btn:hover {
        background: #F5E600;
        color: #101114;
        box-shadow: 0 0 18px rgba(245,230,0,.25);
    }

    /* MAIN */
    .home-main {
        max-width: 1250px;
        margin: 0 auto;
        padding-top: clamp(70px, 13vh, 130px);
    }

    /* WELCOME FRAME */
    .welcome-frame {
        width: fit-content;
        min-width: 270px;
        margin: 0 auto 65px;
        padding: 24px 45px;
        text-align: center;
        background: #191B20;
        border: 1px solid #34363D;
        border-radius: 14px;
        box-shadow: 0 10px 35px rgba(0,0,0,.25);
    }

    .welcome-frame p {
        color: #999;
        font-size: 11px;
        letter-spacing: 5px;
        margin-bottom: 5px;
    }

    .welcome-frame h1 {
        font-size: clamp(32px, 5vw, 48px);
        font-weight: 900;
        letter-spacing: 4px;
        margin: 0;
    }

    .welcome-frame h1 span {
        color: #F5E600;
    }

    .welcome-line {
        height: 2px;
        width: 35px;
        background: #F5E600;
        margin: 12px auto;
    }

    /* MENU */
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 20px;
    }

    .menu-card {
        position: relative;
        min-height: 205px;
        padding: 25px 22px;
        background: #191B20;
        border: 1px solid #303239;
        border-radius: 14px;
        text-decoration: none;
        color: white;
        overflow: hidden;
        transition: transform .3s ease, border-color .3s ease,
                    box-shadow .3s ease, background .3s ease;
    }

    .menu-card:hover {
        transform: translateY(-9px);
        border-color: #F5E600;
        background: #202127;
        box-shadow: 0 12px 30px rgba(245,230,0,.12);
        color: white;
    }

    .menu-icon {
        width: 52px;
        height: 52px;
        display: grid;
        place-items: center;
        background: #292B25;
        color: #F5E600;
        border-radius: 12px;
        font-size: 27px;
        margin-bottom: 23px;
        transition: .3s;
    }

    .menu-card:hover .menu-icon {
        background: #F5E600;
        color: #101114;
        transform: scale(1.08);
    }

    .menu-number {
        position: absolute;
        top: 24px;
        right: 22px;
        color: #666;
        font-size: 12px;
        letter-spacing: 2px;
    }

    .menu-card h4 {
        font-size: 17px;
        font-weight: 800;
        margin-bottom: 7px;
    }

    .menu-card span {
        color: #999;
        font-size: 12px;
    }

    .menu-arrow {
        position: absolute;
        right: 22px;
        bottom: 20px;
        color: #F5E600 !important;
        font-size: 20px !important;
        transition: .3s;
    }

    .menu-card:hover .menu-arrow {
        transform: translate(4px, -4px);
    }

    /* FOOTER */
    .home-footer {
        text-align: center;
        margin-top: 65px;
        color: #666;
        font-size: 10px;
        letter-spacing: 3px;
    }

    .home-footer span {
        color: #F5E600;
    }

    /* TABLET */
    @media(max-width: 992px) {
        .menu-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .home-main {
            padding-top: 75px;
        }
    }

    /* MOBILE */
    @media(max-width: 576px) {
        .home-page {
            padding: 12px;
        }

        .home-header {
            padding: 13px;
            min-height: 70px;
        }

        .brand-icon {
            width: 39px;
            height: 39px;
        }

        .home-brand h3 {
            font-size: 17px;
        }

        .home-brand span {
            font-size: 7px;
        }

        .logout-btn {
            padding: 8px 12px;
            font-size: 12px;
        }

        .home-main {
            padding-top: 65px;
        }

        .welcome-frame {
            margin-bottom: 40px;
            min-width: 0;
            padding: 20px 35px;
        }

        .menu-grid {
            grid-template-columns: 1fr;
            gap: 13px;
        }

        .menu-card {
            min-height: 155px;
            padding: 20px;
        }

        .menu-icon {
            margin-bottom: 15px;
        }

        .home-footer {
            margin-top: 40px;
            line-height: 2;
            font-size: 8px;
        }
    }

    @media(prefers-reduced-motion: reduce) {
        .menu-card,
        .menu-icon,
        .menu-arrow,
        .logout-btn {
            transition: none;
        }
    }
</style>
@endpush

@push('styles')
<style>
html, body {
    height: 100%;
    overflow: hidden !important;
}

.home-page {
    height: 100vh;
    height: 100dvh;
    overflow: hidden !important;
}

.home-main {
    height: calc(100vh - 90px);
    height: calc(100dvh - 90px);
    overflow: hidden !important;
}

@media (max-width: 576px) {
    .home-main {
        height: calc(100dvh - 75px);
    }
}
</style>
@endpush
