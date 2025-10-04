<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProduksiDryerDetailVeneer extends Model
{
    protected $table = 'produksi_dryer_detail_veneers';
    protected $primaryKey = 'id_produksi_dryer_veneer';

    protected $fillable = [
        'id_produksi_dryer',
        'id_ukuran',
        'id_jenis_kayu',
        'veneer_basah_kw1',
        'veneer_basah_kw2',
        'veneer_basah_kw3',
        'veneer_basah_kw4',
        'hasil_kw1',
        'hasil_kw2',
        'hasil_kw3',
        'hasil_kw4',
        'jam_mulai_kerja',
        'jam_selesai_kerja',
    ];

    public function produksiDryer(): BelongsTo
    {
        return $this->belongsTo(ProduksiDryer::class, 'id_produksi_dryer', 'id_produksi_dryer');
    }

    public function ukuran(): BelongsTo
    {
        return $this->belongsTo(Ukuran::class, 'id_ukuran', 'id_ukuran');
    }

    public function jenisKayu(): BelongsTo
    {
        return $this->belongsTo(JenisKayu::class, 'id_jenis_kayu', 'id_jenis_kayu');
    }

    public function target(): BelongsTo
    {
        return $this->belongsTo(Target::class, 'id_target', 'id_target');
    }
}
