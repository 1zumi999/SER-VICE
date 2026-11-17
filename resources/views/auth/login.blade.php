@extends('layouts.app')

@section('title', 'Login - SER-VICE')

@section('content')
<div class="auth-box">
    <div class="card-custom">

        <div class="text-center mb-4">
            <h1 class="brand">SER-VICE</h1>
            <p class="muted mt-2">MOTORCYCLE SERVICE MANAGEMENT</p>
            <h3 class="mt-4 fw-bold">Welcome Back</h3>
            <p class="muted">Silakan masuk untuk melanjutkan.</p>
        </div>

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan email"
                    value="{{ old('email') }}"
                    required autofocus>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required>
            </div>

            <button type="submit" class="btn btn-yellow w-100">
                LOGIN
            </button>
        </form>

        <div class="text-center mt-4">
            <p class="muted mb-0">
                Belum memiliki akun?
                <a href="{{ route('register') }}" class="text-yellow fw-bold">
                    Daftar Sekarang
                </a>
            </p>
        </div>

    </div>
</div>
@endsection

@push('styles')
<style>
.auth-box {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.auth-box .card-custom {
    width: 100%;
    max-width: 400px;
    margin: auto;
    padding: 30px;
    border-radius: 16px;
    background: #191B20;
    border: 1px solid rgba(245, 230, 0, 0.15);
    box-shadow: 0 10px 35px rgba(0, 0, 0, 0.3);
}

.auth-box input {
    width: 100%;
    box-sizing: border-box;
}

@media (max-width: 576px) {
    .auth-box .card-custom {
        padding: 24px 20px;
    }
}
</style>
@endpush

@push('styles')
<style>
.auth-box .card-custom {
    transition: all 0.3s ease;
}

.auth-box .card-custom:hover {
    transform: translateY(-6px);
    border-color: #F5E600;
    box-shadow: 0 12px 35px rgba(245, 230, 0, 0.15);
}

.auth-box button[type="submit"] {
    background: #F5E600 !important;
    color: #101114 !important;
    border: 1px solid #F5E600 !important;
    font-weight: 700;
    transition: all 0.3s ease;
}

.auth-box button[type="submit"]:hover {
    background: #ffffff !important;
    color: #101114 !important;
    transform: translateY(-3px);
    box-shadow: 0 0 18px rgba(245, 230, 0, 0.3);
}
</style>
@endpush

@push('styles')
<style>
.auth-box input.form-control {
    background: transparent !important;
    color: #FFFFFF !important;
    border: 1px solid #F5E600 !important;
    border-radius: 8px;
    box-shadow: none !important;
    transition: all 0.3s ease;
}

.auth-box input.form-control:focus {
    background: transparent !important;
    border-color: #FFFFFF !important;
    box-shadow: 0 0 10px rgba(245, 230, 0, 0.25) !important;
}

.auth-box input.form-control::placeholder {
    color: #888888;
}
</style>
@endpush

@push('styles')
<style>
.auth-box input.form-control:-webkit-autofill,
.auth-box input.form-control:-webkit-autofill:hover,
.auth-box input.form-control:-webkit-autofill:focus,
.auth-box input.form-control:-webkit-autofill:active {
    -webkit-text-fill-color: #FFFFFF !important;
    -webkit-box-shadow: 0 0 0 1000px #191B20 inset !important;
    box-shadow: 0 0 0 1000px #191B20 inset !important;
    border: 1px solid #F5E600 !important;
    transition: background-color 999999s ease-in-out 0s;
}
</style>
@endpush
