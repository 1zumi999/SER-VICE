@extends('layouts.app')

@section('title', 'Data Kendaraan')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Data Kendaraan</h2>
            <p class="text-secondary mb-0">Daftar kendaraan pelanggan SER-VICE.</p>
        </div>
        <a href="{{ route('kendaraan.create') }}" class="btn btn-warning fw-bold">
            + Tambah Kendaraan
        </a>
    </div>

    <div class="card bg-dark border-secondary">
        <div class="card-body table-responsive">
            <table class="table table-dark table-hover align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nomor Plat</th>
                        <th>Pelanggan</th>
                        <th>Jenis Kendaraan</th>
                        <th>No. STNK</th>
                        <th>Tahun</th>
                        <th>Pemilik</th>
                        <th>Warna</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kendaraans as $kendaraan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-bold text-warning">{{ $kendaraan->no_plat }}</td>
                            <td>
                                {{ $kendaraan->pelanggan->nama_lengkap ?? '-' }}
                                <br>
                                <small class="text-secondary">
                                    {{ $kendaraan->pelanggan->id_pelanggan ?? '-' }}
                                </small>
                            </td>
                            <td>{{ $kendaraan->jenis_kendaraan }}</td>
                            <td>{{ $kendaraan->no_stnk }}</td>
                            <td>{{ $kendaraan->tahun_pembuatan }}</td>
                            <td>{{ $kendaraan->nama_pemilik }}</td>
                            <td>{{ $kendaraan->warna_kendaraan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-secondary py-4">
                                Belum ada data kendaraan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
