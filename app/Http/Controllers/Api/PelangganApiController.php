<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PelangganApiController extends Controller
{
    private function generateIdPelanggan()
    {
        $nomor = (Pelanggan::max('id') ?? 0) + 1;

        return 'ARS ' . str_pad($nomor, 4, '0', STR_PAD_LEFT) . ' ZZD';
    }

    public function index()
    {
        return response()->json([
            'message' => 'Daftar pelanggan berhasil diambil.',
            'data' => Pelanggan::with(['kendaraans', 'daftarServices'])->get()
        ]);
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

        $result = DB::transaction(function () use ($validated) {

            $pelanggan = Pelanggan::create([
                'id_pelanggan' => $this->generateIdPelanggan(),
                'nama_lengkap' => $validated['nama_lengkap'],
                'no_hp' => $validated['no_hp'],
                'alamat_pelanggan' => $validated['alamat_pelanggan'],
                'pekerjaan' => $validated['pekerjaan'],
            ]);

            $kendaraan = $pelanggan->kendaraans()->create([
                'no_plat' => $validated['no_plat'],
                'jenis_kendaraan' => $validated['jenis_kendaraan'],
                'no_stnk' => $validated['no_stnk'],
                'tahun_pembuatan' => $validated['tahun_pembuatan'],
                'nama_pemilik' => $validated['nama_pemilik'],
                'warna_kendaraan' => $validated['warna_kendaraan'],
            ]);

            return [
                'pelanggan' => $pelanggan,
                'kendaraan' => $kendaraan,
            ];
        });

        return response()->json([
            'message' => 'Data pelanggan dan kendaraan berhasil disimpan.',
            'data' => [
                'pelanggan' => $result['pelanggan'],
                'kendaraan' => $result['kendaraan'],
            ]
        ], 201);
    }

    public function show(string $id)
    {
        $pelanggan = Pelanggan::with(['kendaraans', 'daftarServices'])->findOrFail($id);

        return response()->json([
            'message' => 'Detail pelanggan berhasil diambil.',
            'data' => $pelanggan
        ]);
    }

    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $validated = $request->validate([
            'id_pelanggan' => ['sometimes', 'required', 'string', Rule::unique('pelanggans')->ignore($pelanggan->id)],
            'nama_lengkap' => 'sometimes|required|string|max:255',
            'no_hp' => 'sometimes|required|string|max:20',
            'alamat_pelanggan' => 'sometimes|required|string',
            'pekerjaan' => 'nullable|string|max:255',
        ]);

        $pelanggan->update($validated);

        return response()->json([
            'message' => 'Data pelanggan berhasil diperbarui.',
            'data' => $pelanggan
        ]);
    }

    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return response()->json([
            'message' => 'Pelanggan berhasil dihapus.'
        ]);
    }
}
