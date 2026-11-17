@extends('layouts.app')

@section('title', 'Register - SER-VICE')

@section('content')
<div class="auth-box">
    <div class="card-custom">

        <div class="text-center mb-4">
            <h1 class="brand">SER-VICE</h1>
            <p class="muted mt-2">MOTORCYCLE SERVICE MANAGEMENT</p>
            <h3 class="mt-4 fw-bold">Create Account</h3>
            <p class="muted">Buat akun untuk mulai menggunakan aplikasi.</p>
        </div>

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text"
                    name="name"
                    class="form-control"
                    placeholder="Masukkan nama lengkap"
                    value="{{ old('name') }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan email"
                    value="{{ old('email') }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password"
                    name="password"
                    class="form-control"
                    placeholder="Minimal 8 karakter"
                    required>
            </div>

            <div class="mb-4">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Ulangi password"
                    required>
            </div>

            <button type="submit" class="btn btn-yellow w-100">
                BUAT AKUN
            </button>
        </form>

        <div class="text-center mt-4">
            <p class="muted mb-0">
                Sudah memiliki akun?
                <a href="{{ route('login') }}" class="text-yellow fw-bold">
                    Login Sekarang
                </a>
            </p>
        </div>

    </div>
</div>
@endsection
