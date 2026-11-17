<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarService extends Model
{
    protected $fillable = [
        'id_servis_pelanggan',
        'pelanggan_id',
        'kendaraan_id',
        'keluhan_kendaraan',
        'tanggal_servis',
    ];

    protected $casts = [
        'tanggal_servis' => 'date',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function dataService()
    {
        return $this->hasOne(DataService::class);
    }

    public function pembayaranService()
    {
        return $this->hasOne(PembayaranService::class);
    }
}
