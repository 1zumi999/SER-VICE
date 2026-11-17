<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DaftarServiceApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Daftar service berhasil diambil.',
            'data' => DaftarService::with([
                'pelanggan',
                'kendaraan',
                'dataService',
                'pembayaranService'
            ])->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis_pelanggan' => 'required|string|unique:daftar_services,id_servis_pelanggan',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $service = DaftarService::create($validated);

        return response()->json([
            'message' => 'Pendaftaran service berhasil ditambahkan.',
            'data' => $service->load(['pelanggan', 'kendaraan'])
        ], 201);
    }

    public function show(string $id)
    {
        $service = DaftarService::with([
            'pelanggan',
            'kendaraan',
            'dataService',
            'pembayaranService'
        ])->findOrFail($id);

        return response()->json([
            'message' => 'Detail service berhasil diambil.',
            'data' => $service
        ]);
    }

    public function update(Request $request, string $id)
    {
        $service = DaftarService::findOrFail($id);

        $validated = $request->validate([
            'id_servis_pelanggan' => ['sometimes', 'required', 'string', Rule::unique('daftar_services')->ignore($service->id)],
            'pelanggan_id' => 'sometimes|required|exists:pelanggans,id',
            'kendaraan_id' => 'sometimes|required|exists:kendaraans,id',
            'keluhan_kendaraan' => 'sometimes|required|string',
            'tanggal_servis' => 'sometimes|required|date',
        ]);

        $service->update($validated);

        return response()->json([
            'message' => 'Data pendaftaran service berhasil diperbarui.',
            'data' => $service->load(['pelanggan', 'kendaraan'])
        ]);
    }

    public function destroy(string $id)
    {
        $service = DaftarService::findOrFail($id);
        $service->delete();

        return response()->json([
            'message' => 'Pendaftaran service berhasil dihapus.'
        ]);
    }
}
