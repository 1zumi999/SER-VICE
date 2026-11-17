@extends('layouts.app')

@section('title', 'Tambah Service - SER-VICE')

@section('content')
@include('daftar_service._navigation')

<style>
    .service-form .btn {
        background-color: #F5E600;
        color: #000000;
        border: 1px solid #F5E600;
        font-weight: 700;
        transition: all .2s ease;
    }

    .service-form .btn:hover {
        background-color: #FFFFFF;
        color: #000000;
        border-color: #FFFFFF;
        transform: translateY(-2px);
    }
    .service-form .form-control,
    .service-form .form-select {
        background-color: #17181C;
        color: #FFFFFF;
        border: 1px solid #444;
        transition: all .2s ease;
    }

    .service-form .form-control:hover,
    .service-form .form-select:hover {
        border-color: #F5E600;
        box-shadow: 0 0 0 2px rgba(245, 230, 0, .15);
    }

    .service-form .form-control:focus,
    .service-form .form-select:focus {
        background-color: #F5E600;
        color: #000000;
        border-color: #F5E600;
        box-shadow: 0 0 0 3px rgba(245, 230, 0, .2);
    }

    .service-form .form-control::placeholder {
        color: #888;
    }

    .service-form .form-control:focus::placeholder {
        color: #333;
    }

    .service-form .form-control:disabled,
    .service-form .form-control[readonly] {
        background-color: #25272D;
        color: #FFFFFF;
    }

    .service-form .form-select option {
        background-color: #17181C;
        color: #FFFFFF;
    }
</style>

<div class="container-fluid">

    <form action="{{ route('daftar-service.store') }}" method="POST" class="service-form">
        @csrf

        <div class="card-custom mb-4">
            <h5 class="fw-bold mb-1">Id Service</h5>
            <p class="muted mb-4"></p>

            <label class="form-label">ID Service Pelanggan</label>
            <input type="text" class="form-control" value="{{ $idService }}" readonly>
        </div>

        <div class="card-custom mb-4">
            <h5 class="fw-bold mb-1"> Data Pelanggan</h5>
            <p class="muted mb-4"></p>

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">ID Pelanggan </label>

                    <select name="pelanggan_id" id="pelanggan_id" class="form-select" required>
                        <option value="">-- Pilih ID Pelanggan --</option>

                        @foreach($pelanggans as $pelanggan)
                            <option value="{{ $pelanggan->id }}"
                                    data-nama="{{ $pelanggan->nama_lengkap }}"
                                    {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>
                                {{ $pelanggan->id_pelanggan }} — {{ $pelanggan->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Pelanggan</label>
                    <input type="text"
                           id="nama_pelanggan"
                           class="form-control"
                           placeholder="Nama akan terisi otomatis"
                           readonly>
                </div>

            </div>
        </div>

        <div class="card-custom mb-4">
            <h5 class="fw-bold mb-1">Data Kendaraan</h5>
            <p class="muted mb-4"></p>

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">No. Plat Kendaraan </label>

                    <select name="kendaraan_id" id="kendaraan_id" class="form-select" required>
                        <option value="">-- Pilih No. Plat --</option>

                        @foreach($kendaraans as $kendaraan)
                            <option value="{{ $kendaraan->id }}"
                                    data-pelanggan="{{ $kendaraan->pelanggan_id }}"
                                    data-jenis="{{ $kendaraan->jenis_kendaraan }}"
                                    data-warna="{{ $kendaraan->warna_kendaraan }}"
                                    {{ old('kendaraan_id') == $kendaraan->id ? 'selected' : '' }}>
                                {{ $kendaraan->no_plat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jenis Kendaraan</label>
                    <input type="text"
                           id="jenis_kendaraan"
                           class="form-control"
                           placeholder="Jenis kendaraan otomatis"
                           readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Warna Kendaraan</label>
                    <input type="text"
                           id="warna_kendaraan"
                           class="form-control"
                           placeholder="Warna kendaraan otomatis"
                           readonly>
                </div>

            </div>
        </div>

        <div class="card-custom mb-4">
            <h5 class="fw-bold mb-1">Informasi Service</h5>
            <p class="muted mb-4"></p>

            <div class="row g-3">

                <div class="col-12">
                    <label class="form-label">Keluhan Kendaraan </label>
                    <textarea name="keluhan_kendaraan"
                              class="form-control"
                              rows="4"
                              placeholder="Jelaskan keluhan atau kerusakan kendaraan..."
                              required>{{ old('keluhan_kendaraan') }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Service </label>
                    <input type="date"
                           name="tanggal_servis"
                           class="form-control"
                           value="{{ old('tanggal_servis', date('Y-m-d')) }}"
                           required>
                </div>

            </div>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data berikut:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="d-flex justify-content-end gap-2 mb-4">
            <a href="{{ route('daftar-service.index') }}" class="btn btn-secondary">
                Batal
            </a>

            <button type="submit" class="btn btn-yellow px-4">
                Simpan Pendaftaran
            </button>
        </div>

    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const pelangganSelect = document.getElementById('pelanggan_id');
    const kendaraanSelect = document.getElementById('kendaraan_id');

    const namaInput = document.getElementById('nama_pelanggan');
    const jenisInput = document.getElementById('jenis_kendaraan');
    const warnaInput = document.getElementById('warna_kendaraan');

    const semuaKendaraan = Array.from(kendaraanSelect.options)
        .slice(1)
        .map(option => ({
            value: option.value,
            text: option.text,
            pelanggan: option.dataset.pelanggan,
            jenis: option.dataset.jenis,
            warna: option.dataset.warna
        }));

    function updatePelanggan() {
        const selected = pelangganSelect.options[pelangganSelect.selectedIndex];

        namaInput.value = selected.dataset.nama || '';

        const pelangganId = pelangganSelect.value;
        const kendaraanLama = kendaraanSelect.value;

        kendaraanSelect.innerHTML = '<option value="">-- Pilih No. Plat --</option>';

        semuaKendaraan
            .filter(item => item.pelanggan === pelangganId)
            .forEach(item => {
                const option = document.createElement('option');
                option.value = item.value;
                option.textContent = item.text;
                option.dataset.jenis = item.jenis;
                option.dataset.warna = item.warna;
                kendaraanSelect.appendChild(option);
            });

        if (semuaKendaraan.some(item =>
            item.value === kendaraanLama && item.pelanggan === pelangganId
        )) {
            kendaraanSelect.value = kendaraanLama;
        }

        updateKendaraan();
    }

    function updateKendaraan() {
        const selected = kendaraanSelect.options[kendaraanSelect.selectedIndex];

        jenisInput.value = selected.dataset.jenis || '';
        warnaInput.value = selected.dataset.warna || '';
    }

    pelangganSelect.addEventListener('change', updatePelanggan);
    kendaraanSelect.addEventListener('change', updateKendaraan);

    updatePelanggan();
});
</script>
@endpush

