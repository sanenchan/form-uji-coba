<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPegawaiRotary extends Model
{
    use HasFactory;

    protected $table = 'detail_pegawai_rotary';
    protected $fillable = [
        'id_produksi',
        'id_pegawai',
        'id_role',
        'jam_masuk',
        'jam_pulang',
    ];

    public function produksi()
    {
        return $this->belongsTo(ProduksiRotary::class, 'id_produksi');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }

}
