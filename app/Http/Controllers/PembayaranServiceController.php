<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarService;
use App\Models\DataService;
use App\Models\PembayaranService;

class PembayaranServiceController extends Controller
{
    public function index()
    {
        $daftarServices = DaftarService::with([
            'pelanggan',
            'kendaraan',
            'dataService',
            'pembayaranService'
        ])->whereHas('dataService')->latest()->get();

        $pembayarans = PembayaranService::with([
            'daftarService.pelanggan',
            'daftarService.kendaraan',
            'daftarService.dataService'
        ])->latest()->get();

        return view('pembayaran.index', compact(
            'daftarServices',
            'pembayarans'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:data_services,daftar_service_id|unique:pembayaran_services,daftar_service_id',
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:Cash,Non Tunai',
            'keterangan' => 'nullable|string',
        ]);

        PembayaranService::create($validated);

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil disimpan!');
    }
}
