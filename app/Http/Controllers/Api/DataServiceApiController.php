<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DataServiceApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Data pengerjaan service berhasil diambil.',
            'data' => DataService::with('daftarService.pelanggan', 'daftarService.kendaraan')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => [
                'required',
                'exists:daftar_services,id',
                'unique:data_services,daftar_service_id'
            ],
            'estimasi_service' => 'required|string',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $data = DataService::create($validated);

        return response()->json([
            'message' => 'Data pengerjaan service berhasil ditambahkan.',
            'data' => $data->load('daftarService')
        ], 201);
    }

    public function show(string $id)
    {
        $data = DataService::with('daftarService.pelanggan', 'daftarService.kendaraan')->findOrFail($id);

        return response()->json([
            'message' => 'Detail pengerjaan service berhasil diambil.',
            'data' => $data
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = DataService::findOrFail($id);

        $validated = $request->validate([
            'daftar_service_id' => [
                'sometimes',
                'required',
                'exists:daftar_services,id',
                Rule::unique('data_services')->ignore($data->id)
            ],
            'estimasi_service' => 'sometimes|required|string',
            'nama_mekanik' => 'sometimes|required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $data->update($validated);

        return response()->json([
            'message' => 'Data pengerjaan service berhasil diperbarui.',
            'data' => $data->load('daftarService')
        ]);
    }

    public function destroy(string $id)
    {
        $data = DataService::findOrFail($id);
        $data->delete();

        return response()->json([
            'message' => 'Data pengerjaan service berhasil dihapus.'
        ]);
    }
}
