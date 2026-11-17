@extends('layouts.app')

@section('title', 'Detail Service')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <h2 class="fw-bold">Detail Pendaftaran Service</h2>
        <p class="text-secondary">Informasi lengkap pendaftaran service kendaraan.</p>
    </div>

    <div class="card bg-dark border-secondary">
        <div class="card-body p-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <small class="text-secondary">ID Service</small>
                    <h5 class="text-warning">{{ $service->id_servis_pelanggan }}</h5>
                </div>
                <div class="col-md-6">
                    <small class="text-secondary">Tanggal Service</small>
                    <h5>{{ $service->tanggal_servis }}</h5>
                </div>
                <div class="col-md-6">
                    <small class="text-secondary">ID Pelanggan</small>
                    <h5>{{ $service->pelanggan->id_pelanggan ?? '-' }}</h5>
                </div>
                <div class="col-md-6">
                    <small class="text-secondary">Nama Pelanggan</small>
                    <h5>{{ $service->pelanggan->nama_lengkap ?? '-' }}</h5>
                </div>
                <div class="col-md-6">
                    <small class="text-secondary">Nomor Plat</small>
                    <h5>{{ $service->kendaraan->no_plat ?? '-' }}</h5>
                </div>
                <div class="col-md-6">
                    <small class="text-secondary">Jenis Kendaraan</small>
                    <h5>{{ $service->kendaraan->jenis_kendaraan ?? '-' }}</h5>
                </div>
                <div class="col-12">
                    <small class="text-secondary">Keluhan Kendaraan</small>
                    <p class="mt-2">{{ $service->keluhan_kendaraan }}</p>
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('pembayaran.index', ['service' => $service->id]) }}"
                   class="btn btn-warning fw-bold">Lanjut ke Pembayaran</a>
                <a href="{{ route('daftar-service.index') }}"
                   class="btn btn-outline-light">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
