@extends('layouts.app')

@section('title', 'Daftar Pelanggan - SER-VICE')

@section('content')
@include('pelanggan._navigation')

<style>
    .customer-title {
        color: #F5E600;
        font-weight: 800;
        text-align: center !important;
        margin-bottom: 25px;
    }

    .customer-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(360px, 430px));
        gap: 16px;
    }

    .customer-card {
        background: #101114;
        border: 1px solid rgba(245,230,0,.5);
        border-radius: 11px;
        padding: 13px;
        min-width: 0;
        transition: .25s ease;
    }

    .customer-card:hover {
        border-color: #F5E600;
        transform: translateY(-3px);
    }

    .customer-header {
        text-align: center;
        padding-bottom: 12px;
        margin-bottom: 12px;
        border-bottom: 1px solid #393939;
    }

    .customer-name {
        color: #F5E600;
        font-size: 16px;
        font-weight: 800;
    }

    .customer-id {
        color: #999;
        font-size: 11px;
    }

    .customer-columns {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
        gap: 6px;
        align-items: start;
    }

    .customer-section {
        background: #1A1C21;
        border: 1px solid #383838;
        border-radius: 8px;
        padding: 9px;
        min-width: 0;
        height: 100%;
    }

    .customer-section-title {
        color: #F5E600;
        font-size: 11px;
        font-weight: 800;
        padding-bottom: 7px;
        margin-bottom: 9px;
        border-bottom: 1px solid #393939;
    }

    .customer-field {
        margin-bottom: 9px;
        min-width: 0;
    }

    .customer-label {
        display: block;
        color: #999;
        font-size: 10px;
        margin-bottom: 2px;
    }

    .customer-value {
        color: #fff;
        font-size: 11px;
        overflow-wrap: anywhere;
        white-space: pre-wrap;
    }

    .vehicle-box {
        border-bottom: 1px solid #393939;
        padding-bottom: 9px;
        margin-bottom: 9px;
    }

    .vehicle-box:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .vehicle-plate {
        color: #F5E600;
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .empty-customer {
        color: #999;
        text-align: center;
        padding: 20px;
    }

    @media(max-width: 600px) {
        .customer-grid {
            grid-template-columns: 1fr;
        }

        .customer-columns {
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            gap: 5px;
        }
    }
</style>

<div class="container-fluid">
    <h2 class="customer-title">DAFTAR PELANGGAN</h2>

    <div class="customer-grid">
        @forelse($pelanggans as $pelanggan)
            <div class="customer-card">

                <div class="customer-header">
                    <div class="customer-name">{{ $pelanggan->nama_lengkap }}</div>
                    <div class="customer-id">{{ $pelanggan->id_pelanggan }}</div>
                </div>

                <div class="customer-columns">

                    <div class="customer-section">
                        <div class="customer-section-title">DATA PELANGGAN</div>

                        <div class="customer-field">
                            <span class="customer-label">Nama Lengkap</span>
                            <div class="customer-value">{{ $pelanggan->nama_lengkap }}</div>
                        </div>

                        <div class="customer-field">
                            <span class="customer-label">Nomor HP</span>
                            <div class="customer-value">{{ $pelanggan->no_hp }}</div>
                        </div>

                        <div class="customer-field">
                            <span class="customer-label">Alamat Pelanggan</span>
                            <div class="customer-value">{{ $pelanggan->alamat_pelanggan }}</div>
                        </div>

                        <div class="customer-field mb-0">
                            <span class="customer-label">Pekerjaan</span>
                            <div class="customer-value">{{ $pelanggan->pekerjaan }}</div>
                        </div>
                    </div>

                    <div class="customer-section">
                        <div class="customer-section-title">DATA KENDARAAN</div>

                        @forelse($pelanggan->kendaraans as $kendaraan)
                            <div class="vehicle-box">
                                <div class="vehicle-plate">{{ $kendaraan->no_plat }}</div>

                                <div class="customer-field">
                                    <span class="customer-label">Nomor Plat</span>
                                    <div class="customer-value">{{ $kendaraan->no_plat }}</div>
                                </div>

                                <div class="customer-field">
                                    <span class="customer-label">Jenis Kendaraan</span>
                                    <div class="customer-value">{{ $kendaraan->jenis_kendaraan }}</div>
                                </div>

                                <div class="customer-field">
                                    <span class="customer-label">Nomor STNK</span>
                                    <div class="customer-value">{{ $kendaraan->no_stnk }}</div>
                                </div>

                                <div class="customer-field">
                                    <span class="customer-label">Tahun Pembuatan</span>
                                    <div class="customer-value">{{ $kendaraan->tahun_pembuatan }}</div>
                                </div>

                                <div class="customer-field">
                                    <span class="customer-label">Nama Pemilik</span>
                                    <div class="customer-value">{{ $kendaraan->nama_pemilik }}</div>
                                </div>

                                <div class="customer-field mb-0">
                                    <span class="customer-label">Warna Kendaraan</span>
                                    <div class="customer-value">{{ $kendaraan->warna_kendaraan }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="customer-value">Belum ada kendaraan.</div>
                        @endforelse
                    </div>

                </div>
            </div>
        @empty
            <div class="empty-customer">Belum ada data pelanggan.</div>
        @endforelse
    </div>
</div>
@endsection
