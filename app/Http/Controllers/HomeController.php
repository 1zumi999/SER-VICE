<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DaftarService;
use App\Models\PembayaranService;

class HomeController extends Controller
{
    public function index()
    {
        $totalPelanggan = Pelanggan::count();
        $totalKendaraan = Kendaraan::count();
        $totalService = DaftarService::count();
        $totalPembayaran = PembayaranService::count();

        $latestServices = DaftarService::with([
            'pelanggan',
            'kendaraan',
            'dataService',
            'pembayaranService'
        ])->latest()->take(5)->get();

        return view('home.index', compact(
            'totalPelanggan',
            'totalKendaraan',
            'totalService',
            'totalPembayaran',
            'latestServices'
        ));
    }
}
