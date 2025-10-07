<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidasiHasilRotary extends Model
{
    use HasFactory;

    protected $table = 'validasi_hasil_rotary';
    protected $fillable = [
        'id_hasil_palet',
        'id_pegawai',
        'id_role',
    ];

    public function hasilPalet()
    {
        return $this->belongsTo(DetailHasilPaletRotary::class, 'id_hasil_palet');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
