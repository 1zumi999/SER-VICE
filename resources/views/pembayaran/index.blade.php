@extends('layouts.app')

@section('title', 'Pembayaran - SER-VICE')

@section('content')

<style>
    .payment-navigation {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin: 10px 0 30px;
        flex-wrap: wrap;
    }

    .payment-navigation a {
        background: #101114;
        color: #F5E600;
        border: 1px solid #F5E600;
        padding: 10px 24px;
        border-radius: 7px;
        text-decoration: none;
        font-weight: 700;
        transition: .2s ease;
    }

    .payment-navigation a:hover,
    .payment-navigation a.active {
        background: #F5E600;
        color: #000;
    }

    .payment-title {
        color: #F5E600;
        text-align: center;
        font-weight: 800;
        margin-bottom: 30px;
    }

    .payment-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 18px;
    }

    .payment-card {
        background: #17181C;
        border: 1px solid #383838;
        border-radius: 10px;
        padding: 18px;
        transition: .25s ease;
    }

    .payment-card:hover {
        border-color: #F5E600;
        transform: translateY(-4px);
        box-shadow: 0 5px 18px rgba(245,230,0,.12);
    }

    .payment-card h6 {
        color: #F5E600;
        font-weight: 800;
    }

    .payment-info {
        background: #25272D;
        border-radius: 7px;
        padding: 12px;
        margin-top: 14px;
    }

    .payment-field {
        margin-bottom: 11px;
    }

    .payment-field:last-child {
        margin-bottom: 0;
    }

    .payment-label {
        display: block;
        color: #A0A0A0;
        font-size: 11px;
        margin-bottom: 3px;
    }

    .payment-value {
        color: white;
        font-size: 13px;
        overflow-wrap: anywhere;
    }

    .payment-status {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 5px;
        font-size: 10px;
        font-weight: 800;
        background: #198754;
        color: white;
    }

    .payment-actions {
        margin-top: 15px;
        display: flex;
        justify-content: flex-end;
    }

    .payment-actions .btn {
        background: #F5E600;
        color: black;
        border: 1px solid #F5E600;
        font-weight: 700;
    }

    .payment-actions .btn:hover {
        background: white;
        border-color: white;
    }

    .payment-form .form-control,
    .payment-form .form-select {
        background-color: #25272D;
        color: white;
        border: 1px solid #444;
        transition: .2s ease;
    }

    .payment-form .form-control:hover,
    .payment-form .form-select:hover {
        border-color: #F5E600;
        box-shadow: 0 0 0 1px #F5E600;
    }

    .payment-form .form-control:focus,
    .payment-form .form-select:focus {
        background-color: #F5E600;
        color: #000;
        border-color: #F5E600;
        box-shadow: 0 0 0 2px rgba(245,230,0,.25);
        outline: none;
    }

    .payment-form .form-control:focus::placeholder {
        color: #555;
    }

    .payment-form .form-control[readonly] {
        cursor: not-allowed;
    }

    .payment-form .form-select option {
        background: #25272D;
        color: white;
    }

    .payment-form .form-check-input {
        background-color: #25272D;
        border-color: #777;
    }

    .payment-form .form-check-input:checked {
        background-color: #F5E600;
        border-color: #F5E600;
    }

    .payment-form .form-check-input:focus {
        box-shadow: 0 0 0 .2rem rgba(245,230,0,.25);
    }

    .payment-form button[type="submit"] {
        background-color: #F5E600;
        color: #000;
        border: 1px solid #F5E600;
        font-weight: 700;
    }

    .payment-form button[type="submit"]:hover {
        background-color: #D9CC00;
        color: #000;
        border-color: #D9CC00;
    }

    .payment-modal .modal-content {
        background: #191B20;
        color: white;
    }

    .payment-modal .modal-header,
    .payment-modal .modal-footer {
        border-color: #383A40;
    }

    .payment-modal .modal-section {
        background: #22242A;
        border-radius: 8px;
        padding: 12px;
    }

    /* Penyesuaian tampilan mengikuti halaman Pelanggan */
    .payment-navigation {
        gap: 14px;
        margin: 10px 0 30px;
    }

    .payment-navigation a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        background: #101114;
        color: #F5E600;
        border: 1px solid #F5E600;
        padding: 13px 20px;
        border-radius: 9px;
        font-size: 13px;
        transition: .25s ease;
    }

    .payment-navigation a:hover,
    .payment-navigation a.active {
        background: #F5E600;
        color: #000;
        transform: translateY(-4px);
        box-shadow: 0 5px 14px rgba(245,230,0,.18);
    }

    .payment-title {
        margin-bottom: 25px;
    }

    .payment-card {
        background: #101114;
        border: 1px solid rgba(245,230,0,.5);
        border-radius: 11px;
        padding: 13px;
        transition: .25s ease;
    }

    .payment-card:hover {
        border-color: #F5E600;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(245,230,0,.12);
    }

    .payment-info {
        background: #1A1C21;
        border: 1px solid #383838;
        border-radius: 8px;
        padding: 10px;
        margin-top: 12px;
    }

    .payment-field {
        padding: 2px 0;
    }

    .payment-form {
        background: #101114;
        border: 1px solid rgba(245,230,0,.5);
        border-radius: 11px;
        padding: 20px;
    }

    .payment-form .form-label {
        color: #F5E600;
        font-size: 13px;
        font-weight: 600;
    }

    .payment-form .form-control,
    .payment-form .form-select {
        background-color: #1A1C21;
        color: white;
        border: 1px solid #383838;
        border-radius: 7px;
    }

    .payment-form .form-control[readonly] {
        background: #1A1C21;
        color: #F5E600;
    }

    .payment-form .form-control:hover,
    .payment-form .form-select:hover {
        border-color: #F5E600;
        box-shadow: 0 0 0 1px #F5E600;
    }

    .payment-form .form-control:focus,
    .payment-form .form-select:focus {
        background: #F5E600;
        color: #000;
        border-color: #F5E600;
        box-shadow: 0 0 0 2px rgba(245,230,0,.25);
    }

    .payment-form .form-control:focus::placeholder {
        color: #555;
    }

    .payment-form .form-select option {
        background: #1A1C21;
        color: white;
    }

    .payment-actions .btn,
    .payment-form button[type="submit"] {
        background: #F5E600;
        color: #000;
        border: 1px solid #F5E600;
        border-radius: 7px;
        font-weight: 700;
        transition: .2s ease;
    }

    .payment-actions .btn:hover,
    .payment-form button[type="submit"]:hover {
        background: #000;
        color: #F5E600;
        border-color: #F5E600;
    }

    @media (max-width: 576px) {
        .payment-navigation {
            display: grid;
            grid-template-columns: 1fr;
        }

        .payment-navigation a {
            width: 100%;
        }

        .payment-form {
            padding: 14px;
        }
    }
</style>

<div class="container-fluid">

    <h2 class="payment-title">PEMBAYARAN</h2>

    <div class="payment-navigation">
        <a href="{{ route('home') }}">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                <path d="m3 10 9-7 9 7"></path>
                <path d="M5 9v12h14V9M9 21v-7h6v7"></path>
            </svg>
            HOME
        </a>

        <a href="#list-pembayaran" id="btn-list-pembayaran">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="4" y="3" width="16" height="18" rx="2"></rect>
                <path d="M8 8h8M8 12h8M8 16h5"></path>
            </svg>
            DAFTAR PEMBAYARAN
        </a>

        <a href="#tambah-pembayaran" id="btn-tambah-pembayaran">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 5v14M5 12h14"></path>
            </svg>
            TAMBAH PEMBAYARAN
        </a>
    </div>

    {{-- LIST DATA PEMBAYARAN --}}
    <div id="list-pembayaran">

        <div class="card-custom">

            <h5 class="fw-bold mb-4" style="color:#F5E600;">
                LIST DATA PEMBAYARAN
            </h5>

            <div class="payment-grid">

                @forelse($pembayarans as $bayar)

                    <div class="payment-card">

                        <h6 class="mb-1">
                            {{ $bayar->daftarService->id_servis_pelanggan ?? '-' }}
                        </h6>

                        <div class="text-muted small">
                            {{ $bayar->daftarService->pelanggan->nama_lengkap ?? '-' }}
                        </div>

                        <div class="payment-info">

                            <div class="payment-field">
                                <span class="payment-label">Nama Pelanggan</span>
                                <div class="payment-value">
                                    {{ $bayar->daftarService->pelanggan->nama_lengkap ?? '-' }}
                                </div>
                            </div>

                            <div class="payment-field">
                                <span class="payment-label">No. Plat Kendaraan</span>
                                <div class="payment-value">
                                    {{ $bayar->daftarService->kendaraan->no_plat ?? '-' }}
                                </div>
                            </div>

                            <div class="payment-field">
                                <span class="payment-label">Jumlah Biaya</span>
                                <div class="payment-value fw-bold text-warning">
                                    Rp {{ number_format($bayar->jumlah_biaya, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="payment-field">
                                <span class="payment-label">Jenis Pembayaran</span>
                                <div class="payment-value">
                                    {{ $bayar->jenis_pembayaran }}
                                </div>
                            </div>

                            <div class="payment-field">
                                <span class="payment-label">Tanggal Transaksi</span>
                                <div class="payment-value">
                                    {{ $bayar->created_at->format('d/m/Y H:i') }}
                                </div>
                            </div>

                        </div>

                        <div class="mt-3">
                            <span class="payment-status">
                                PEMBAYARAN SELESAI
                            </span>
                        </div>

                        <div class="payment-actions">
                            <button type="button"
                                    class="btn btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#rekap{{ $bayar->id }}">
                                LIHAT REKAP
                            </button>
                        </div>

                    </div>

                @empty

                    <div class="text-center text-muted py-4">
                        Belum ada transaksi pembayaran.
                    </div>

                @endforelse

            </div>
        </div>

    </div>

    {{-- TAMBAH PEMBAYARAN --}}
    <div id="tambah-pembayaran" style="display:none;">

        <div class="card-custom payment-form">

            <h5 class="fw-bold mb-1">Tambah Pembayaran</h5>

            <p class="muted mb-4">
                Catat transaksi pembayaran service kendaraan.
            </p>

            <form action="{{ route('pembayaran.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    <div class="col-12">
                        <label class="form-label">ID Service Pelanggan *</label>

                        <select name="daftar_service_id"
                                id="daftar_service_id"
                                class="form-select"
                                required>

                            <option value="">-- Pilih ID Service --</option>

                            @foreach($daftarServices->whereNull('pembayaranService') as $service)
                                <option value="{{ $service->id }}"
                                        data-pelanggan="{{ $service->pelanggan->nama_lengkap ?? '-' }}"
                                        data-idpelanggan="{{ $service->pelanggan->id_pelanggan ?? '-' }}"
                                        data-plat="{{ $service->kendaraan->no_plat ?? '-' }}"
                                        data-jenis="{{ $service->kendaraan->jenis_kendaraan ?? '-' }}"
                                        data-keluhan="{{ $service->keluhan_kendaraan }}"
                                        data-estimasi="{{ $service->dataService->estimasi_service ?? '-' }}"
                                        data-mekanik="{{ $service->dataService->nama_mekanik ?? '-' }}"
                                        data-sparepart="{{ $service->dataService->sparepart_pengganti ?? '-' }}"
                                        {{ old('daftar_service_id') == $service->id ? 'selected' : '' }}>

                                    {{ $service->id_servis_pelanggan }}
                                    — {{ $service->pelanggan->nama_lengkap ?? '-' }}
                                    — {{ $service->kendaraan->no_plat ?? '-' }}

                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-12">
                        <hr style="border-color:#444;">
                        <h6 class="fw-bold text-warning">
                            Informasi Service
                        </h6>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">ID Pelanggan</label>
                        <input type="text"
                               id="id_pelanggan"
                               class="form-control"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text"
                               id="nama_pelanggan"
                               class="form-control"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">No. Plat Kendaraan</label>
                        <input type="text"
                               id="no_plat"
                               class="form-control"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jenis Kendaraan</label>
                        <input type="text"
                               id="jenis_kendaraan"
                               class="form-control"
                               readonly>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Keluhan Kendaraan</label>
                        <textarea id="keluhan_kendaraan"
                                  class="form-control"
                                  rows="2"
                                  readonly></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Estimasi Service</label>
                        <textarea id="estimasi_service"
                                  class="form-control"
                                  rows="3"
                                  readonly></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nama Mekanik</label>
                        <input type="text"
                               id="nama_mekanik"
                               class="form-control"
                               readonly>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Sparepart Pengganti</label>
                        <textarea id="sparepart_pengganti"
                                  class="form-control"
                                  rows="2"
                                  readonly></textarea>
                    </div>

                    <div class="col-12">
                        <hr style="border-color:#444;">
                        <h6 class="fw-bold text-warning">
                            Informasi Pembayaran
                        </h6>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Biaya (Rp) *</label>

                        <input type="number"
                               name="jumlah_biaya"
                               class="form-control"
                               placeholder="Masukkan jumlah pembayaran"
                               value="{{ old('jumlah_biaya') }}"
                               min="0"
                               step="1"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jenis Pembayaran *</label>

                        <div class="d-flex gap-4 mt-2">

                            <div class="form-check">
                                <input type="radio"
                                       name="jenis_pembayaran"
                                       value="Cash"
                                       id="cash"
                                       class="form-check-input"
                                       {{ old('jenis_pembayaran') == 'Cash' ? 'checked' : '' }}
                                       required>

                                <label class="form-check-label" for="cash">
                                    Cash
                                </label>
                            </div>

                            <div class="form-check">
                                <input type="radio"
                                       name="jenis_pembayaran"
                                       value="Non Tunai"
                                       id="non_tunai"
                                       class="form-check-input"
                                       {{ old('jenis_pembayaran') == 'Non Tunai' ? 'checked' : '' }}>

                                <label class="form-check-label" for="non_tunai">
                                    Non Tunai
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Keterangan</label>

                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Tambahkan keterangan pembayaran (opsional)">{{ old('keterangan') }}</textarea>
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
                    <button type="submit" class="btn px-4">
                        Simpan Pembayaran
                    </button>
                </div>

            </form>
        </div>

    </div>

    {{-- MODAL REKAP PEMBAYARAN --}}
    @foreach($pembayarans as $bayar)

        <div class="modal fade payment-modal"
             id="rekap{{ $bayar->id }}"
             tabindex="-1">

            <div class="modal-dialog modal-lg modal-dialog-centered">

                <div class="modal-content">

                    <div class="modal-header">

                        <div>
                            <h5 class="modal-title fw-bold text-warning">
                                SER-VICE
                            </h5>

                            <small class="muted">
                                REKAP PEMBAYARAN SERVICE
                            </small>
                        </div>

                        <button type="button"
                                class="btn-close btn-close-white"
                                data-bs-dismiss="modal">
                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="text-center py-3 mb-3 modal-section">
                            <div class="text-success fs-2">✓</div>

                            <h5 class="fw-bold mb-1">
                                Pembayaran Tercatat
                            </h5>

                            <p class="muted mb-0">
                                Transaksi berhasil disimpan.
                            </p>
                        </div>

                        <h6 class="text-warning fw-bold mb-3">
                            Informasi Transaksi
                        </h6>

                        <div class="row g-3 mb-4">

                            <div class="col-md-6">
                                <small class="muted">ID Service</small>
                                <div class="fw-bold">
                                    {{ $bayar->daftarService->id_servis_pelanggan ?? '-' }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <small class="muted">Tanggal Transaksi</small>
                                <div class="fw-bold">
                                    {{ $bayar->created_at->format('d/m/Y H:i') }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <small class="muted">Nama Pelanggan</small>
                                <div>
                                    {{ $bayar->daftarService->pelanggan->nama_lengkap ?? '-' }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <small class="muted">ID Pelanggan</small>
                                <div>
                                    {{ $bayar->daftarService->pelanggan->id_pelanggan ?? '-' }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <small class="muted">No. Plat</small>
                                <div>
                                    {{ $bayar->daftarService->kendaraan->no_plat ?? '-' }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <small class="muted">Jenis Kendaraan</small>
                                <div>
                                    {{ $bayar->daftarService->kendaraan->jenis_kendaraan ?? '-' }}
                                </div>
                            </div>

                        </div>

                        <hr style="border-color:#444;">

                        <h6 class="text-warning fw-bold mb-3">
                            Detail Pengerjaan
                        </h6>

                        <div class="mb-3">
                            <small class="muted">Keluhan Kendaraan</small>
                            <div>
                                {{ $bayar->daftarService->keluhan_kendaraan ?? '-' }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <small class="muted">Estimasi Service</small>
                            <div>
                                {{ $bayar->daftarService->dataService->estimasi_service ?? '-' }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <small class="muted">Nama Mekanik</small>
                            <div>
                                {{ $bayar->daftarService->dataService->nama_mekanik ?? '-' }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <small class="muted">Sparepart Pengganti</small>
                            <div>
                                {{ $bayar->daftarService->dataService->sparepart_pengganti ?: '-' }}
                            </div>
                        </div>

                        <hr style="border-color:#444;">

                        <h6 class="text-warning fw-bold mb-3">
                            Detail Pembayaran
                        </h6>

                        <div class="row g-3">

                            <div class="col-md-6">
                                <small class="muted">Jenis Pembayaran</small>
                                <div class="fw-bold">
                                    {{ $bayar->jenis_pembayaran }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <small class="muted">Jumlah Biaya</small>
                                <div class="fw-bold text-warning fs-5">
                                    Rp {{ number_format($bayar->jumlah_biaya, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="col-12">
                                <small class="muted">Keterangan</small>
                                <div>
                                    {{ $bayar->keterangan ?: 'Tidak ada keterangan.' }}
                                </div>
                            </div>

                        </div>

                        <div class="text-center mt-4 pt-3"
                             style="border-top:1px dashed #555;">

                            <small class="muted">
                                Terima kasih telah menggunakan layanan SER-VICE.
                            </small>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                            Tutup
                        </button>

                        <button type="button"
                                class="btn btn-yellow"
                                onclick="window.print()">
                            Cetak Rekap
                        </button>

                    </div>

                </div>
            </div>
        </div>

    @endforeach

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const listPage = document.getElementById('list-pembayaran');
    const formPage = document.getElementById('tambah-pembayaran');

    const btnList = document.getElementById('btn-list-pembayaran');
    const btnTambah = document.getElementById('btn-tambah-pembayaran');

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

        history.replaceState(null, '', '#list-pembayaran');
        showPage('list');
    });

    btnTambah.addEventListener('click', function (event) {
        event.preventDefault();

        history.replaceState(null, '', '#tambah-pembayaran');
        showPage('tambah');
    });

    if (
        window.location.hash === '#tambah-pembayaran' ||
        @json($errors->any())
    ) {
        showPage('tambah');
    } else {
        showPage('list');
    }

    const select = document.getElementById('daftar_service_id');

    if (select) {

        const fields = {
            id_pelanggan: 'idpelanggan',
            nama_pelanggan: 'pelanggan',
            no_plat: 'plat',
            jenis_kendaraan: 'jenis',
            keluhan_kendaraan: 'keluhan',
            estimasi_service: 'estimasi',
            nama_mekanik: 'mekanik',
            sparepart_pengganti: 'sparepart'
        };

        function updateInformasi() {
            const option = select.options[select.selectedIndex];

            Object.entries(fields).forEach(([id, attribute]) => {
                document.getElementById(id).value =
                    option.dataset[attribute] || '';
            });
        }

        select.addEventListener('change', updateInformasi);
        updateInformasi();
    }

    @if(session('success') && $pembayarans->isNotEmpty())

        const latestPaymentId = {{ $pembayarans->first()->id }};
        const modalElement = document.getElementById('rekap' + latestPaymentId);

        if (modalElement && window.bootstrap) {
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
        }

    @endif

});
</script>
@endpush

