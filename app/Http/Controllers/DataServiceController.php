<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarService;
use App\Models\DataService;

class DataServiceController extends Controller
{
    public function index()
    {
        $daftarServices = DaftarService::with([
            'pelanggan',
            'kendaraan',
            'dataService'
        ])->latest()->get();

        $dataServices = DataService::with('daftarService')->latest()->get();

        return view('data_service.index', compact(
            'daftarServices',
            'dataServices'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id|unique:data_services,daftar_service_id',
            'estimasi_service' => 'required|string',
            'nama_mekanik' => 'required|string|max:100',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        DataService::create($validated);

        return redirect()->route('data-service.index')
            ->with('success', 'Data pengerjaan service berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $dataService = DataService::findOrFail($id);

        $validated = $request->validate([
            'estimasi_service' => 'required|string',
            'nama_mekanik' => 'required|string|max:100',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $dataService->update($validated);

        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil diperbarui!');
    }
}
