@extends('layouts.app')

@section('title', 'Data Service - SER-VICE')

@section('content')

<style>
    .data-service-navigation {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin: 10px 0 30px;
        flex-wrap: wrap;
    }

    .data-service-navigation a {
        background: #101114;
        color: #F5E600;
        border: 1px solid #F5E600;
        padding: 10px 24px;
        border-radius: 7px;
        text-decoration: none;
        font-weight: 700;
        transition: .2s ease;
    }

    .data-service-navigation a:hover,
    .data-service-navigation a.active {
        background: #F5E600;
        color: #000;
    }

    .data-service-title {
        color: #F5E600;
        text-align: center;
        font-weight: 800;
        margin-bottom: 30px;
    }

    .data-service-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 18px;
    }

    .data-service-card {
        background: #17181C;
        border: 1px solid #383838;
        border-radius: 10px;
        padding: 18px;
        transition: .25s ease;
    }

    .data-service-card:hover {
        border-color: #F5E600;
        transform: translateY(-4px);
        box-shadow: 0 5px 18px rgba(245,230,0,.12);
    }

    .data-service-card h6 {
        color: #F5E600;
        font-weight: 800;
    }

    .data-service-info {
        background: #25272D;
        border-radius: 7px;
        padding: 12px;
        margin-top: 14px;
    }

    .data-service-field {
        margin-bottom: 11px;
    }

    .data-service-field:last-child {
        margin-bottom: 0;
    }

    .data-service-label {
        display: block;
        color: #A0A0A0;
        font-size: 11px;
        margin-bottom: 3px;
    }

    .data-service-value {
        color: white;
        font-size: 13px;
        overflow-wrap: anywhere;
    }

    .status-service {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 5px;
        font-size: 10px;
        font-weight: 800;
    }

    .status-selesai {
        background: #198754;
        color: white;
    }

    .status-belum {
        background: #F5E600;
        color: black;
    }

    .data-service-actions {
        margin-top: 15px;
        display: flex;
        justify-content: flex-end;
    }

    .data-service-actions .btn {
        background: #F5E600;
        color: black;
        border: 1px solid #F5E600;
        font-weight: 700;
    }

    .data-service-actions .btn:hover {
        background: white;
        border-color: white;
    }

    .data-service-form .form-control,
    .data-service-form .form-select {
        background-color: #25272D;
        color: white;
        border: 1px solid #444;
        transition: .2s ease;
    }

    .data-service-form .form-control:hover,
    .data-service-form .form-select:hover {
        border-color: #F5E600;
        box-shadow: 0 0 0 1px #F5E600;
    }

    .data-service-form .form-control:focus,
    .data-service-form .form-select:focus {
        background-color: #F5E600;
        color: #000000;
        border-color: #F5E600;
        box-shadow: 0 0 0 2px rgba(245,230,0,.25);
        outline: none;
    }

    .data-service-form .form-control:focus::placeholder {
        color: #555555;
    }

    .data-service-form .form-control[readonly] {
        cursor: not-allowed;
    }

    .data-service-form .form-select option {
        background: #25272D;
        color: white;
    }
    .data-service-form button[type="submit"] {
        background-color: #F5E600;
        color: #000000;
        border: 1px solid #F5E600;
        font-weight: 700;
    }

    .data-service-form button[type="submit"]:hover {
        background-color: #D9CC00;
        color: #000000;
        border-color: #D9CC00;
    }

    /* NAVIGASI */
    .data-service-navigation {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 0 0 30px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .data-service-nav-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 13px 20px;
        background: #101114;
        color: #F5E600;
        border: 1px solid #F5E600;
        border-radius: 9px;
        text-decoration: none;
        font-weight: 700;
        font-size: 14px;
        transition: all .25s ease-in-out;
    }

    .data-service-nav-btn svg {
        width: 20px;
        height: 20px;
        fill: currentColor;
        flex-shrink: 0;
    }

    .data-service-nav-btn:hover,
    .data-service-nav-btn.active {
        background: #F5E600;
        color: #101114;
        border-color: #F5E600;
        transform: translateY(-4px);
        box-shadow: 0 6px 18px rgba(245,230,0,.25);
    }

    /* JUDUL DAN KARTU */
    .data-service-title {
        margin-bottom: 25px;
    }

    .data-service-grid {
        grid-template-columns: repeat(auto-fill, minmax(360px, 430px));
        gap: 16px;
    }

    .data-service-card {
        background: #101114;
        border: 1px solid rgba(245,230,0,.5);
        border-radius: 11px;
        padding: 13px;
        min-width: 0;
        transition: .25s ease;
    }

    .data-service-card:hover {
        border-color: #F5E600;
        transform: translateY(-3px);
        box-shadow: 0 5px 18px rgba(245,230,0,.12);
    }

    .data-service-card h6 {
        text-align: center;
        font-size: 16px;
    }

    .data-service-info {
        background: #1A1C21;
        border: 1px solid #383838;
        border-radius: 8px;
        padding: 9px;
        margin-top: 12px;
    }

    .data-service-field {
        margin-bottom: 9px;
    }

    .data-service-label {
        color: #999;
        font-size: 10px;
    }

    .data-service-value {
        font-size: 11px;
        overflow-wrap: anywhere;
    }

    /* FORM */
    .data-service-form .form-control,
    .data-service-form .form-select {
        background: #101114;
        color: #fff;
        border: 1px solid #383838;
        transition: all .2s ease;
    }

    @media (hover: hover) and (pointer: fine) {
        .data-service-form .form-control:not([readonly]):hover,
        .data-service-form .form-select:hover {
            background: #F5E600;
            color: #101114;
            border-color: #F5E600;
            box-shadow: 0 0 12px rgba(245,230,0,.35);
        }
    }

    .data-service-form .form-control:focus,
    .data-service-form .form-select:focus {
        background: #F5E600;
        color: #101114;
        border-color: #F5E600;
        box-shadow: 0 0 12px rgba(245,230,0,.35);
    }

    .data-service-form .form-control::placeholder {
        color: #999;
    }

    .data-service-form .form-control:focus::placeholder {
        color: #444;
    }

    .data-service-form .form-control[readonly] {
        background: #101114;
        color: #F5E600;
        cursor: not-allowed;
    }

    .data-service-form .form-select option {
        background: #1A1C21;
        color: #fff;
    }

    .data-service-form button[type="submit"] {
        background: #F5E600;
        color: #101114;
        border: 1px solid #F5E600;
        font-weight: 700;
        transition: .2s ease;
    }

    .data-service-form button[type="submit"]:hover {
        background: #101114;
        color: #F5E600;
    }

    @media(max-width: 576px) {
        .data-service-navigation {
            display: grid;
            grid-template-columns: 1fr;
        }

        .data-service-nav-btn {
            width: 100%;
        }

        .data-service-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container-fluid">

    <h2 class="data-service-title">DATA SERVICE</h2>

    <div class="data-service-navigation">
        <a href="{{ route('home') }}" class="data-service-nav-btn">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M3 10.5L12 3l9 7.5v9a1 1 0 0 1-1 1h-5v-6h-6v6H4a1 1 0 0 1-1-1z"/>
            </svg>
            <span>Home</span>
        </a>

        <a href="#list-data-service" id="btn-list" class="data-service-nav-btn">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M5 4h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1zm3 4v2h2V8zm4 0v2h5V8zm-4 5v2h2v-2zm4 0v2h5v-2zm-4 5v1h2v-1zm4 0v1h5v-1z"/>
            </svg>
            <span>Daftar Data Service</span>
        </a>

        <a href="#tambah-data-service" id="btn-tambah" class="data-service-nav-btn">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm1 5v4h4v2h-4v4h-2v-4H7v-2h4V7z"/>
            </svg>
            <span>Tambah Data Service</span>
        </a>
    </div>

    {{-- HALAMAN LIST DATA SERVICE --}}
    <div id="list-data-service">

        <div class="card-custom">
            <h5 class="fw-bold mb-4" style="color:#F5E600;">
                LIST DATA SERVICE
            </h5>

            <div class="data-service-grid">

                @forelse($daftarServices as $service)

                    @php
                        $data = $service->dataService;
                    @endphp

                    <div class="data-service-card">

                        <h6 class="mb-1">
                            {{ $service->id_servis_pelanggan }}
                        </h6>

                        <div class="text-muted small">
                            {{ $service->pelanggan->nama_lengkap ?? '-' }}
                        </div>

                        <div class="data-service-info">

                            <div class="data-service-field">
                                <span class="data-service-label">Nama Pelanggan</span>
                                <div class="data-service-value">
                                    {{ $service->pelanggan->nama_lengkap ?? '-' }}
                                </div>
                            </div>

                            <div class="data-service-field">
                                <span class="data-service-label">No. Plat Kendaraan</span>
                                <div class="data-service-value">
                                    {{ $service->kendaraan->no_plat ?? '-' }}
                                </div>
                            </div>

                            <div class="data-service-field">
                                <span class="data-service-label">Keluhan Kendaraan</span>
                                <div class="data-service-value">
                                    {{ $service->keluhan_kendaraan ?? '-' }}
                                </div>
                            </div>

                            <div class="data-service-field">
                                <span class="data-service-label">Estimasi Service</span>
                                <div class="data-service-value">
                                    {{ $data->estimasi_service ?? '-' }}
                                </div>
                            </div>

                            <div class="data-service-field">
                                <span class="data-service-label">Nama Mekanik</span>
                                <div class="data-service-value">
                                    {{ $data->nama_mekanik ?? '-' }}
                                </div>
                            </div>

                            <div class="data-service-field">
                                <span class="data-service-label">Sparepart Pengganti</span>
                                <div class="data-service-value">
                                    {{ $data->sparepart_pengganti ?? '-' }}
                                </div>
                            </div>

                        </div>

                        <div class="mt-3">
                            @if($data)
                                <span class="status-service status-selesai">
                                    TELAH DIKERJAKAN
                                </span>
                            @else
                                <span class="status-service status-belum">
                                    BELUM DIKERJAKAN
                                </span>
                            @endif
                        </div>

                        @if($data)
                            <div class="data-service-actions">
                                <button type="button" class="btn btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editService{{ $data->id }}">
                                    EDIT
                                </button>
                            </div>

                            <div class="modal fade"
                                 id="editService{{ $data->id }}"
                                 tabindex="-1">

                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content"
                                         style="background:#191B20;color:white;">

                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold">
                                                Edit Data Service
                                            </h5>

                                            <button type="button"
                                                    class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal"></button>
                                        </div>

                                        <form action="{{ route('data-service.update', $data->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label class="form-label">ID Service</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           value="{{ $service->id_servis_pelanggan }}"
                                                           readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Estimasi Service *</label>
                                                    <textarea name="estimasi_service"
                                                              class="form-control"
                                                              rows="3"
                                                              required>{{ $data->estimasi_service }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Nama Mekanik *</label>
                                                    <input type="text"
                                                           name="nama_mekanik"
                                                           class="form-control"
                                                           value="{{ $data->nama_mekanik }}"
                                                           required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Sparepart Pengganti</label>
                                                    <textarea name="sparepart_pengganti"
                                                              class="form-control"
                                                              rows="3">{{ $data->sparepart_pengganti }}</textarea>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                    Batal
                                                </button>

                                                <button type="submit" class="btn btn-yellow">
                                                    Simpan Perubahan
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                @empty

                    <div class="text-center text-muted py-4">
                        Belum ada data service.
                    </div>

                @endforelse

            </div>
        </div>

    </div>

    {{-- HALAMAN TAMBAH DATA SERVICE --}}
    <div id="tambah-data-service" style="display:none;">

        <div class="card-custom data-service-form">

            <h5 class="fw-bold mb-1">Tambah Data Pengerjaan</h5>
            <p class="muted mb-4">
                Catat pengerjaan berdasarkan pendaftaran service.
            </p>

            <form action="{{ route('data-service.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">ID Service Pelanggan *</label>

                        <select name="daftar_service_id"
                                id="daftar_service_id"
                                class="form-select"
                                required>
                            <option value="">-- Pilih ID Service --</option>

                            @foreach($daftarServices->whereNull('dataService') as $service)
                                <option value="{{ $service->id }}"
                                        data-keluhan="{{ $service->keluhan_kendaraan }}"
                                        data-pelanggan="{{ $service->pelanggan->nama_lengkap ?? '-' }}"
                                        data-plat="{{ $service->kendaraan->no_plat ?? '-' }}"
                                        {{ old('daftar_service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->id_servis_pelanggan }}
                                    — {{ $service->pelanggan->nama_lengkap ?? '-' }}
                                    — {{ $service->kendaraan->no_plat ?? '-' }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" id="nama_pelanggan"
                               class="form-control" readonly
                               placeholder="Otomatis dari pendaftaran">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">No. Plat Kendaraan</label>
                        <input type="text" id="no_plat"
                               class="form-control" readonly
                               placeholder="Otomatis dari pendaftaran">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Keluhan Kendaraan</label>
                        <textarea id="keluhan_kendaraan"
                                  class="form-control"
                                  rows="3" readonly
                                  placeholder="Keluhan otomatis dari pendaftaran"></textarea>
                    </div>

                    <div class="col-12">
                        <hr style="border-color:#444;">
                        <h6 class="fw-bold text-warning">
                            Informasi Pengerjaan
                        </h6>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Estimasi Service *</label>
                        <textarea name="estimasi_service"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Contoh: Pemeriksaan mesin, penggantian oli..."
                                  required>{{ old('estimasi_service') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nama Mekanik *</label>
                        <input type="text"
                               name="nama_mekanik"
                               class="form-control"
                               placeholder="Masukkan nama mekanik"
                               value="{{ old('nama_mekanik') }}"
                               required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Sparepart Pengganti</label>
                        <textarea name="sparepart_pengganti"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Masukkan sparepart yang diganti (opsional)">{{ old('sparepart_pengganti') }}</textarea>
                    </div>

                </div>

                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <strong>Periksa kembali data berikut:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-yellow px-4">
                        Simpan Data Service
                    </button>
                </div>

            </form>
        </div>

    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const listPage = document.getElementById('list-data-service');
    const formPage = document.getElementById('tambah-data-service');

    const btnList = document.getElementById('btn-list');
    const btnTambah = document.getElementById('btn-tambah');

    function showPage(page) {
        const isForm = page === 'tambah';

        listPage.style.display = isForm ? 'none' : 'block';
        formPage.style.display = isForm ? 'block' : 'none';

        btnList.classList.toggle('active', !isForm);
        btnTambah.classList.toggle('active', isForm);

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    btnList.addEventListener('click', function (event) {
        event.preventDefault();
        history.replaceState(null, '', '#list-data-service');
        showPage('list');
    });

    btnTambah.addEventListener('click', function (event) {
        event.preventDefault();
        history.replaceState(null, '', '#tambah-data-service');
        showPage('tambah');
    });

    if (window.location.hash === '#tambah-data-service' || @json($errors->any())) {
        showPage('tambah');
    } else {
        showPage('list');
    }

    const select = document.getElementById('daftar_service_id');

    if (select) {
        const keluhan = document.getElementById('keluhan_kendaraan');
        const pelanggan = document.getElementById('nama_pelanggan');
        const plat = document.getElementById('no_plat');

        function updateInformasi() {
            const option = select.options[select.selectedIndex];

            keluhan.value = option.dataset.keluhan || '';
            pelanggan.value = option.dataset.pelanggan || '';
            plat.value = option.dataset.plat || '';
        }

        select.addEventListener('change', updateInformasi);
        updateInformasi();
    }

});
</script>
@endpush




