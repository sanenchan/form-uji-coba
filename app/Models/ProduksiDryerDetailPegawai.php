<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProduksiDryerDetailPegawai extends Model
{
    protected $table = 'produksi_dryer_detail_pegawais';
    protected $primaryKey = 'id_produksi_dryer_pegawais';

    protected $fillable = [
        'id_produksi_dryer',
        'id_pegawai',
        'jam_masuk',
        'jam_pulang',
        'potongan_target',
        'keterangan',
    ];

    public function produksiDryer(): BelongsTo
    {
        return $this->belongsTo(ProduksiDryer::class, 'id_produksi_dryer', 'id_produksi_dryer');
    }

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
