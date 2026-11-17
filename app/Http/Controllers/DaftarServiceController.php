<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DaftarService;

class DaftarServiceController extends Controller
{
    private function generateIdService()
    {
        $nomor = (DaftarService::max('id') ?? 0) + 1;

        return 'ENC ' . str_pad($nomor, 4, '0', STR_PAD_LEFT) . ' RPR';
    }

    public function index()
    {
        $daftarServices = DaftarService::with([
            'pelanggan',
            'kendaraan',
            'dataService',
            'pembayaranService'
        ])->latest()->get();

        return view('daftar_service.index', compact('daftarServices'));
    }

    public function create()
    {
        $idService = $this->generateIdService();

        $pelanggans = Pelanggan::with('kendaraans')->get();
        $kendaraans = Kendaraan::with('pelanggan')->get();

        return view('daftar_service.create', compact(
            'idService',
            'pelanggans',
            'kendaraans'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $kendaraan = Kendaraan::findOrFail($validated['kendaraan_id']);

        if ($kendaraan->pelanggan_id != $validated['pelanggan_id']) {
            return back()->withErrors([
                'kendaraan_id' => 'Kendaraan tidak sesuai dengan pelanggan yang dipilih.'
            ])->withInput();
        }

        $nomor = (DaftarService::max('id') ?? 0) + 1;

        DaftarService::create([
            'id_servis_pelanggan' => 'ENC ' . str_pad($nomor, 4, '0', STR_PAD_LEFT) . ' RPR',
            'pelanggan_id' => $validated['pelanggan_id'],
            'kendaraan_id' => $validated['kendaraan_id'],
            'keluhan_kendaraan' => $validated['keluhan_kendaraan'],
            'tanggal_servis' => $validated['tanggal_servis'],
        ]);

        return redirect()->route('daftar-service.index')
            ->with('success', 'Pendaftaran service berhasil disimpan!');
    }

    public function show($id)
    {
        $daftarService = DaftarService::with([
            'pelanggan',
            'kendaraan',
            'dataService',
            'pembayaranService'
        ])->findOrFail($id);

        return view('daftar_service.show', compact('daftarService'));
    }
}
