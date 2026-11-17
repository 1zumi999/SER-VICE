<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PembayaranService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PembayaranServiceApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Data pembayaran berhasil diambil.',
            'data' => PembayaranService::with('daftarService.pelanggan', 'daftarService.kendaraan')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => [
                'required',
                'exists:daftar_services,id',
                'unique:pembayaran_services,daftar_service_id'
            ],
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran = PembayaranService::create($validated);

        return response()->json([
            'message' => 'Pembayaran berhasil ditambahkan.',
            'data' => $pembayaran->load('daftarService')
        ], 201);
    }

    public function show(string $id)
    {
        $pembayaran = PembayaranService::with('daftarService.pelanggan', 'daftarService.kendaraan')->findOrFail($id);

        return response()->json([
            'message' => 'Detail pembayaran berhasil diambil.',
            'data' => $pembayaran
        ]);
    }

    public function update(Request $request, string $id)
    {
        $pembayaran = PembayaranService::findOrFail($id);

        $validated = $request->validate([
            'daftar_service_id' => [
                'sometimes',
                'required',
                'exists:daftar_services,id',
                Rule::unique('pembayaran_services')->ignore($pembayaran->id)
            ],
            'jumlah_biaya' => 'sometimes|required|numeric|min:0',
            'jenis_pembayaran' => 'sometimes|required|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran->update($validated);

        return response()->json([
            'message' => 'Data pembayaran berhasil diperbarui.',
            'data' => $pembayaran->load('daftarService')
        ]);
    }

    public function destroy(string $id)
    {
        $pembayaran = PembayaranService::findOrFail($id);
        $pembayaran->delete();

        return response()->json([
            'message' => 'Pembayaran berhasil dihapus.'
        ]);
    }
}
