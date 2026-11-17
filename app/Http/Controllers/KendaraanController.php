<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\Pelanggan;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::with('pelanggan')->latest()->get();

        return view('kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::orderBy('nama_lengkap')->get();

        return view('kendaraan.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'no_plat' => 'required|string|max:15|unique:kendaraans,no_plat',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|string|max:30|unique:kendaraans,no_stnk',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:100',
            'warna_kendaraan' => 'required|string|max:50',
        ]);

        Kendaraan::create($request->only([
            'pelanggan_id',
            'no_plat',
            'jenis_kendaraan',
            'no_stnk',
            'tahun_pembuatan',
            'nama_pemilik',
            'warna_kendaraan',
        ]));

        return redirect()->route('kendaraan.index')
            ->with('success', 'Kendaraan berhasil didaftarkan.');
    }
}
