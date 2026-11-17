<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranService extends Model
{
    protected $fillable = [
        'daftar_service_id',
        'jumlah_biaya',
        'jenis_pembayaran',
        'keterangan',
    ];

    protected $casts = [
        'jumlah_biaya' => 'decimal:2',
    ];

    public function daftarService()
    {
        return $this->belongsTo(DaftarService::class);
    }
}
