<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailHasilPaletRotary extends Model
{
    use HasFactory;

    protected $table = 'detail_hasil_palet_rotary';
    protected $fillable = [
        'id_produksi',
        'timestamp_laporan',
        'id_ukuran',
        'id_kw',
        'total',
    ];

    public function produksi()
    {
        return $this->belongsTo(ProduksiRotary::class, 'id_produksi');
    }

    public function ukuran()
    {
        return $this->belongsTo(Ukuran::class, 'id_ukuran', 'id_ukuran');
    }

    public function validasis()
    {
        return $this->hasMany(ValidasiHasilRotary::class, 'id_hasil_palet', 'id');
    }
}
