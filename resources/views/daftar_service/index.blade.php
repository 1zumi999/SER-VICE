@extends('layouts.app')

@section('title', 'Daftar Service - SER-VICE')

@section('content')
@include('daftar_service._navigation')

<style>
    .service-title {
        color: #F5E600;
        font-weight: 800;
        text-align: center;
        margin-bottom: 25px;
    }

    .service-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(360px, 430px));
        gap: 18px;
    }

    .service-card {
        background: #101114;
        border: 1px solid rgba(245,230,0,.5);
        border-radius: 11px;
        overflow: hidden;
        transition: .25s ease;
    }

    .service-card:hover {
        border-color: #F5E600;
        transform: translateY(-3px);
        box-shadow: 0 5px 18px rgba(245,230,0,.12);
    }

    .service-header {
        background: transparent;
        text-align: center;
        padding: 0 0 12px;
        margin-bottom: 12px;
        border-bottom: 1px solid #393939;
    }

    .service-name {
        color: #F5E600;
        font-size: 16px;
        font-weight: 800;
    }

    .service-id {
        color: #999;
        font-size: 11px;
        margin-top: 4px;
    }

    .service-body {
        padding: 0;
    }

    .service-columns {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 6px;
    }

    .service-section {
        background: #1A1C21;
        border: 1px solid #383838;
        border-radius: 8px;
        padding: 9px;
        min-width: 0;
    }

    .service-section-title {
        color: #F5E600;
        font-size: 11px;
        font-weight: 800;
        padding-bottom: 7px;
        margin-bottom: 9px;
        border-bottom: 1px solid #393939;
        text-align: left;
    }

    .service-field {
        margin-bottom: 12px;
        text-align: left;
    }

    .service-field:last-child {
        margin-bottom: 0;
    }

    .service-label {
        display: block;
        color: #B0B0B0;
        font-size: 10px;
        margin-bottom: 4px;
    }

    .service-value {
        color: #FFFFFF;
        font-size: 12px;
        line-height: 1.5;
        overflow-wrap: anywhere;
        white-space: normal;
    }

    .service-status {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 5px;
        font-size: 10px;
        font-weight: 700;
    }

    .service-actions {
        display: flex;
        justify-content: flex-end;
        margin-top: 12px;
    }

    .service-detail {
        display: inline-block;
        background: #F5E600;
        color: #101114;
        border: 1px solid #F5E600;
        padding: 7px 15px;
        border-radius: 5px;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
        transition: .2s ease;
    }

    .service-detail:hover {
        background: transparent;
        color: #F5E600;
    }

    .empty-service {
        color: #999;
        text-align: center;
        padding: 25px;
    }

    @media(max-width: 600px) {
        .service-grid {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width: 420px) {
        .service-columns {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container-fluid">

    <h2 class="service-title">DAFTAR SERVICE</h2>

    <div class="service-grid">

        @forelse($daftarServices as $index => $service)

            <div class="service-card">

                {{-- JUDUL DAN ID SERVICE --}}
                <div class="service-header">
                    <div class="service-name">
                        {{ $service->pelanggan->nama_lengkap ?? '-' }}
                    </div>

                    <div class="service-id">
                        ID SERVICE: {{ $service->id_servis_pelanggan }}
                    </div>
                </div>

                <div class="service-body">

                    <div class="service-columns">

                        {{-- DATA PENDAFTARAN --}}
                        <div class="service-section">

                            <div class="service-section-title">
                                DATA PENDAFTARAN
                            </div>

                            <div class="service-field">
                                <span class="service-label">No.</span>
                                <div class="service-value">
                                    {{ $index + 1 }}
                                </div>
                            </div>

                            <div class="service-field">
                                <span class="service-label">ID Pelanggan</span>
                                <div class="service-value">
                                    {{ $service->pelanggan->id_pelanggan ?? '-' }}
                                </div>
                            </div>

                            <div class="service-field">
                                <span class="service-label">Nama Pelanggan</span>
                                <div class="service-value">
                                    {{ $service->pelanggan->nama_lengkap ?? '-' }}
                                </div>
                            </div>

                            <div class="service-field">
                                <span class="service-label">Tanggal Service</span>
                                <div class="service-value">
                                    {{ $service->tanggal_servis
                                        ? \Carbon\Carbon::parse($service->tanggal_servis)->format('d/m/Y')
                                        : '-' }}
                                </div>
                            </div>

                        </div>

                        {{-- DATA KENDARAAN --}}
                        <div class="service-section">

                            <div class="service-section-title">
                                DATA KENDARAAN
                            </div>

                            <div class="service-field">
                                <span class="service-label">No. Plat</span>
                                <div class="service-value" style="color:#F5E600;font-weight:800;">
                                    {{ $service->kendaraan->no_plat ?? '-' }}
                                </div>
                            </div>

                            <div class="service-field">
                                <span class="service-label">Jenis Kendaraan</span>
                                <div class="service-value">
                                    {{ $service->kendaraan->jenis_kendaraan ?? '-' }}
                                </div>
                            </div>

                            <div class="service-field">
                                <span class="service-label">Warna Kendaraan</span>
                                <div class="service-value">
                                    {{ $service->kendaraan->warna_kendaraan ?? '-' }}
                                </div>
                            </div>

                            <div class="service-field">
                                <span class="service-label">Keluhan Kendaraan</span>
                                <div class="service-value">
                                    {{ $service->keluhan_kendaraan ?? '-' }}
                                </div>
                            </div>

                            <div class="service-field">
                                <span class="service-label">Status Service</span>

                                @if($service->pembayaranService)
                                    <span class="service-status bg-success text-white">LUNAS</span>
                                @elseif($service->dataService)
                                    <span class="service-status bg-info text-dark">MENUNGGU PEMBAYARAN</span>
                                @else
                                    <span class="service-status bg-warning text-dark">TERDAFTAR</span>
                                @endif
                            </div>

                        </div>

                    </div></div>

            </div>

        @empty

            <div class="empty-service">
                Belum ada pendaftaran service.
            </div>

        @endforelse

    </div>

</div>
@endsection


