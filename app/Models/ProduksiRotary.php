<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduksiRotary extends Model
{
    use HasFactory;

    protected $table = 'produksi_rotary';
    protected $fillable = [
        'id_mesin',
        'tgl_produksi',
        'kendala',
    ];

    public function mesin()
    {
        return $this->belongsTo(Mesin::class, 'id_mesin', 'id_mesin');
    }

    public function detailLahans()
    {
        return $this->hasMany(DetailLahanRotary::class, 'id_produksi', 'id');
    }

    public function detailPegawais()
    {
        return $this->hasMany(DetailPegawaiRotary::class, 'id_produksi', 'id');
    }

    public function detailHasilPalets()
    {
        return $this->hasMany(DetailHasilPaletRotary::class, 'id_produksi', 'id');
    }
}
