<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLahanRotary extends Model
{
    use HasFactory;

    protected $table = 'detail_lahan_rotary';
    protected $fillable = [
        'id_lahan',
        'id_produksi',
        'jumlah_batang',
    ];

    public function produksi()
    {
        return $this->belongsTo(ProduksiRotary::class, 'id_produksi');
    }

    public function lahan()
    {
        return $this->belongsTo(Lahan::class, 'id_lahan', 'id_lahan');
    }
}
