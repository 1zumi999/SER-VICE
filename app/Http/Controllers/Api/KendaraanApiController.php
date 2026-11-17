<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KendaraanApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Daftar kendaraan berhasil diambil.',
            'data' => Kendaraan::with('pelanggan')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'no_plat' => 'required|string|unique:kendaraans,no_plat',
            'jenis_kendaraan' => 'required|string',
            'no_stnk' => 'required|string|unique:kendaraans,no_stnk',
            'tahun_pembuatan' => 'required|integer|min:1900|max:2100',
            'nama_pemilik' => 'required|string|max:255',
            'warna_kendaraan' => 'required|string|max:100',
        ]);

        $kendaraan = Kendaraan::create($validated);

        return response()->json([
            'message' => 'Kendaraan berhasil ditambahkan.',
            'data' => $kendaraan
        ], 201);
    }

    public function show(string $id)
    {
        $kendaraan = Kendaraan::with('pelanggan')->findOrFail($id);

        return response()->json([
            'message' => 'Detail kendaraan berhasil diambil.',
            'data' => $kendaraan
        ]);
    }

    public function update(Request $request, string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $validated = $request->validate([
            'pelanggan_id' => 'sometimes|required|exists:pelanggans,id',
            'no_plat' => ['sometimes', 'required', 'string', Rule::unique('kendaraans')->ignore($kendaraan->id)],
            'jenis_kendaraan' => 'sometimes|required|string',
            'no_stnk' => ['sometimes', 'required', 'string', Rule::unique('kendaraans')->ignore($kendaraan->id)],
            'tahun_pembuatan' => 'sometimes|required|integer|min:1900|max:2100',
            'nama_pemilik' => 'sometimes|required|string|max:255',
            'warna_kendaraan' => 'sometimes|required|string|max:100',
        ]);

        $kendaraan->update($validated);

        return response()->json([
            'message' => 'Data kendaraan berhasil diperbarui.',
            'data' => $kendaraan
        ]);
    }

    public function destroy(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return response()->json([
            'message' => 'Kendaraan berhasil dihapus.'
        ]);
    }
}
