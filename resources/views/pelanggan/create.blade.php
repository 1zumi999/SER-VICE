@extends('layouts.app')

@section('title', 'Tambah Pelanggan - SER-VICE')

@section('content')
@include('pelanggan._navigation')

<style>
    /* Input normal */
    .customer-form .form-control {
        background-color: #101114;
        color: #ffffff;
        border: 1px solid #F5E600;
        transition: all 0.2s ease;
    }

    /* Placeholder */
    .customer-form .form-control::placeholder {
        color: #999999;
    }

    /* Hover dan saat mengetik */
    .customer-form .form-control:hover,
    .customer-form .form-control:focus {
        background-color: #F5E600;
        color: #101114;
        border-color: #F5E600;
        box-shadow: 0 0 10px rgba(245, 230, 0, 0.2);
    }

    .customer-form .form-control:hover::placeholder,
    .customer-form .form-control:focus::placeholder {
        color: #444444;
    }

    /* ID pelanggan readonly */
    .customer-form .form-control[readonly] {
        background-color: #101114;
        color: #F5E600;
        cursor: not-allowed;
    }

    /* Radio button */
    .customer-form .form-check-input {
        background-color: #101114;
        border: 1px solid #F5E600;
        cursor: pointer;
        accent-color: #F5E600;
    }

    .customer-form .form-check-input:checked {
        background-color: #F5E600;
        border-color: #F5E600;
    }

    .customer-form .form-check-input:focus {
        box-shadow: 0 0 0 0.2rem rgba(245, 230, 0, 0.25);
        border-color: #F5E600;
    }

    .customer-form .form-check-label {
        color: #ffffff;
        cursor: pointer;
    }

    .customer-form .form-label {
        color: #ffffff;
    }
</style>

<div class="container-fluid customer-form">

    <div class="mb-4">
        <h2 class="fw-bold text-center" style="color: #F5E600;">Tambah Pelanggan</h2>
    </div>

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf

        {{-- DATA PELANGGAN --}}
        <div class="card-custom mb-4">
            <div class="mb-4">
                <h5 class="fw-bold mb-1">Data Pelanggan</h5>
            </div>

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">ID Pelanggan</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $idPelanggan }}"
                           readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Lengkap </label>
                    <input type="text"
                           name="nama_lengkap"
                           class="form-control"
                           placeholder="Masukkan nama lengkap"
                           value="{{ old('nama_lengkap') }}"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label"> No. HP </label>
                    <input type="text"
                           name="no_hp"
                           class="form-control"
                           placeholder="0812xxxxxxxx"
                           value="{{ old('no_hp') }}"
                           maxlength="12"
                           inputmode="numeric"
                           pattern="[0-9]{1,12}"
                           required>
                    <small class="muted">Maksimal 12 angka.</small>
                </div>

                <div class="col-md-6">
                    <label class="form-label"> Pekerjaan </label>
                    <input type="text"
                           name="pekerjaan"
                           class="form-control"
                           placeholder="Mahasiswa / Karyawan"
                           value="{{ old('pekerjaan') }}"
                           required>
                </div>

                <div class="col-12">
                    <label class="form-label"> Alamat Pelanggan </label>
                    <textarea name="alamat_pelanggan"
                              class="form-control"
                              rows="3"
                              placeholder="Masukkan alamat lengkap tempat tinggal"
                              required>{{ old('alamat_pelanggan') }}</textarea>
                </div>

            </div>
        </div>

        {{-- DATA KENDARAAN --}}
        <div class="card-custom mb-4">
            <div class="mb-4">
                <h5 class="fw-bold mb-1"> Data Kendaraan</h5>
            </div>

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label"> No. Plat Kendaraan </label>
                    <input type="text"
                           name="no_plat"
                           class="form-control text-uppercase"
                           placeholder="BL 1234 XX"
                           value="{{ old('no_plat') }}"
                           style="text-transform:uppercase"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label"> Jenis Kendaraan </label>

                    <div class="d-flex gap-4 mt-2">
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="jenis_kendaraan"
                                   value="Matic"
                                   id="matic"
                                   {{ old('jenis_kendaraan') == 'Matic' ? 'checked' : '' }}
                                   required>
                            <label class="form-check-label" for="matic">
                                Matic
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="jenis_kendaraan"
                                   value="Manual Transmisi"
                                   id="manual"
                                   {{ old('jenis_kendaraan') == 'Manual Transmisi' ? 'checked' : '' }}>
                            <label class="form-check-label" for="manual">
                                Manual Transmisi
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label"> No. STNK </label>
                    <input type="text"
                           name="no_stnk"
                           class="form-control text-uppercase"
                           placeholder="Masukkan nomor STNK"
                           value="{{ old('no_stnk') }}"
                           style="text-transform:uppercase"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label"> Tahun Pembuatan </label>
                    <input type="number"
                           name="tahun_pembuatan"
                           class="form-control"
                           placeholder="Contoh: 2022"
                           value="{{ old('tahun_pembuatan') }}"
                           min="1900"
                           max="{{ date('Y') + 1 }}"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label"> Nama Pemilik </label>
                    <input type="text"
                           name="nama_pemilik"
                           class="form-control"
                           placeholder="Masukkan nama pemilik kendaraan"
                           value="{{ old('nama_pemilik') }}"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label"> Warna Kendaraan </label>
                    <input type="text"
                           name="warna_kendaraan"
                           class="form-control"
                           placeholder="Contoh: Hitam"
                           value="{{ old('warna_kendaraan') }}"
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
            <a href="{{ route('pelanggan.index') }}"
               class="btn btn-secondary">
                Batal
            </a>

            <button type="submit" class="btn btn-yellow px-4">
                Simpan Data Pelanggan
            </button>
        </div>

    </form>
</div>
@endsection

<style>
/* Hover hanya aktif pada perangkat yang menggunakan mouse */
@media (hover: hover) and (pointer: fine) {
    .customer-form input.form-control:hover,
    .customer-form textarea.form-control:hover {
        background-color: #F5E600 !important;
        color: #101114 !important;
        border-color: #F5E600 !important;
        box-shadow: 0 0 12px rgba(245, 230, 0, 0.35) !important;
    }
}

/* Kondisi normal */
.customer-form input.form-control:not(:focus),
.customer-form textarea.form-control:not(:focus) {
    background-color: #101114 !important;
    color: #ffffff !important;
}

/* Kondisi sedang diklik atau mengetik */
.customer-form input.form-control:focus,
.customer-form textarea.form-control:focus {
    background-color: #F5E600 !important;
    color: #101114 !important;
    border-color: #F5E600 !important;
    box-shadow: 0 0 12px rgba(245, 230, 0, 0.35) !important;
}

/* Placeholder saat hover atau fokus */
.customer-form .form-control:hover::placeholder,
.customer-form .form-control:focus::placeholder {
    color: #444444 !important;
}

/* ID otomatis tetap gelap */
.customer-form input.form-control[readonly],
.customer-form input.form-control[readonly]:hover,
.customer-form input.form-control[readonly]:focus {
    background-color: #101114 !important;
    color: #F5E600 !important;
    box-shadow: none !important;
}

/* Radio button terpilih */
.customer-form .form-check-input:checked {
    background-color: #F5E600 !important;
    border-color: #F5E600 !important;
}
</style>

<style>
/* Hover hanya aktif pada perangkat yang menggunakan mouse */
@media (hover: hover) and (pointer: fine) {
    .customer-form input.form-control:hover,
    .customer-form textarea.form-control:hover {
        background-color: #F5E600 !important;
        color: #101114 !important;
        border-color: #F5E600 !important;
        box-shadow: 0 0 12px rgba(245, 230, 0, 0.35) !important;
    }
}

/* Kondisi normal */
.customer-form input.form-control:not(:focus),
.customer-form textarea.form-control:not(:focus) {
    background-color: #101114 !important;
    color: #ffffff !important;
}

/* Kondisi sedang diklik atau mengetik */
.customer-form input.form-control:focus,
.customer-form textarea.form-control:focus {
    background-color: #F5E600 !important;
    color: #101114 !important;
    border-color: #F5E600 !important;
    box-shadow: 0 0 12px rgba(245, 230, 0, 0.35) !important;
}

/* Placeholder saat hover atau fokus */
.customer-form .form-control:hover::placeholder,
.customer-form .form-control:focus::placeholder {
    color: #444444 !important;
}

/* ID otomatis tetap gelap */
.customer-form input.form-control[readonly],
.customer-form input.form-control[readonly]:hover,
.customer-form input.form-control[readonly]:focus {
    background-color: #101114 !important;
    color: #F5E600 !important;
    box-shadow: none !important;
}

/* Radio button terpilih */
.customer-form .form-check-input:checked {
    background-color: #F5E600 !important;
    border-color: #F5E600 !important;
}
</style>

<style>
.customer-form input.form-control,
.customer-form textarea.form-control {
    border: 1px solid #444444 !important;
}

.customer-form input.form-control:hover,
.customer-form textarea.form-control:hover,
.customer-form input.form-control:focus,
.customer-form textarea.form-control:focus {
    border: 1px solid #F5E600 !important;
}

.customer-form input.form-control[readonly],
.customer-form input.form-control[readonly]:hover,
.customer-form input.form-control[readonly]:focus {
    border: 1px solid #444444 !important;
}
</style>

