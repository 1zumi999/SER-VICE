<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggan;
use App\Models\Kendaraan;

class PelangganController extends Controller
{
    private function generateIdPelanggan()
    {
        $nomor = (Pelanggan::max('id') ?? 0) + 1;

        return 'ARS ' . str_pad($nomor, 4, '0', STR_PAD_LEFT) . ' ZZD';
    }

    public function index()
    {
        $pelanggans = Pelanggan::with('kendaraans')->latest()->get();

        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        $idPelanggan = $this->generateIdPelanggan();

        return view('pelanggan.create', compact('idPelanggan'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'no_plat' => strtoupper($request->no_plat ?? ''),
            'no_stnk' => strtoupper($request->no_stnk ?? ''),
        ]);

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'no_hp' => ['required', 'regex:/^[0-9]{1,12}$/'],
            'alamat_pelanggan' => 'required|string',
            'pekerjaan' => 'required|string|max:100',
            'no_plat' => 'required|string|max:20|unique:kendaraans,no_plat',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|string|max:50|unique:kendaraans,no_stnk',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'nama_pemilik' => 'required|string|max:100',
            'warna_kendaraan' => 'required|string|max:50',
        ]);

        DB::transaction(function () use ($validated) {
            $pelanggan = Pelanggan::create([
                'id_pelanggan' => $this->generateIdPelanggan(),
                'nama_lengkap' => $validated['nama_lengkap'],
                'no_hp' => $validated['no_hp'],
                'alamat_pelanggan' => $validated['alamat_pelanggan'],
                'pekerjaan' => $validated['pekerjaan'],
            ]);

            Kendaraan::create([
                'pelanggan_id' => $pelanggan->id,
                'no_plat' => $validated['no_plat'],
                'jenis_kendaraan' => $validated['jenis_kendaraan'],
                'no_stnk' => $validated['no_stnk'],
                'tahun_pembuatan' => $validated['tahun_pembuatan'],
                'nama_pemilik' => $validated['nama_pemilik'],
                'warna_kendaraan' => $validated['warna_kendaraan'],
            ]);
        });

        return redirect()->route('home')
            ->with('success', 'Data pelanggan dan kendaraan berhasil disimpan!');
    }
}
