@extends('layouts.app')

@section('title', 'Tambah Kendaraan')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <h2 class="fw-bold">Tambah Kendaraan</h2>
        <p class="text-secondary">Masukkan informasi kendaraan pelanggan.</p>
    </div>

    <div class="card bg-dark border-secondary">
        <div class="card-body p-4">
            <form action="{{ route('kendaraan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Pilih Pelanggan</label>
                    <select name="pelanggan_id" class="form-select border border-warning border-2" required>
                        <option value="">-- Pilih ID Pelanggan --</option>
                        @foreach ($pelanggans as $pelanggan)
                            <option value="{{ $pelanggan->id }}"
                                {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>
                                {{ $pelanggan->id_pelanggan }} - {{ $pelanggan->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                    @error('pelanggan_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Plat Kendaraan</label>
                    <input type="text" name="no_plat" class="form-control"
                        value="{{ old('no_plat') }}" placeholder="Contoh: BL 1234 AA" required>
                    @error('no_plat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Jenis Kendaraan</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kendaraan"
                            value="Matic" id="matic"
                            {{ old('jenis_kendaraan') == 'Matic' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="matic">Matic</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kendaraan"
                            value="Manual Transmisi" id="manual"
                            {{ old('jenis_kendaraan') == 'Manual Transmisi' ? 'checked' : '' }}>
                        <label class="form-check-label" for="manual">Manual Transmisi</label>
                    </div>
                    @error('jenis_kendaraan')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor STNK</label>
                    <input type="text" name="no_stnk" class="form-control"
                        value="{{ old('no_stnk') }}" required>
                    @error('no_stnk')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Pembuatan</label>
                    <input type="number" name="tahun_pembuatan" class="form-control"
                        value="{{ old('tahun_pembuatan') }}" min="1900"
                        max="{{ date('Y') + 1 }}" required>
                    @error('tahun_pembuatan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Pemilik Kendaraan</label>
                    <input type="text" name="nama_pemilik" class="form-control"
                        value="{{ old('nama_pemilik') }}" required>
                    @error('nama_pemilik')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Warna Kendaraan</label>
                    <input type="text" name="warna_kendaraan" class="form-control"
                        value="{{ old('warna_kendaraan') }}" placeholder="Contoh: Hitam" required>
                    @error('warna_kendaraan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-warning fw-bold">
                        Simpan Kendaraan
                    </button>
                    <a href="{{ route('kendaraan.index') }}" class="btn btn-outline-light">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
