<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProduksiDryer extends Model
{
    protected $table = 'produksi_dryers';
    protected $primaryKey = 'id_produksi_dryer';

    protected $fillable = [
        'tanggal_produksi',
        'id_mesin',
        'jumlah_pekerja',
        'kendala',
    ];

    // Relasi ke Mesin
    public function mesin(): BelongsTo
    {
        return $this->belongsTo(Mesin::class, 'id_mesin', 'id_mesin');
    }

    // Relasi ke Detail Veneer
    public function detailVeneers(): HasMany
    {
        return $this->hasMany(ProduksiDryerDetailVeneer::class, 'id_produksi_dryer', 'id_produksi_dryer');
    }

    // Relasi ke Detail Pegawai
    public function detailPegawais(): HasMany
    {
        return $this->hasMany(ProduksiDryerDetailPegawai::class, 'id_produksi_dryer', 'id_produksi_dryer');
    }
}
