<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduksiRotary extends Model
{
    use HasFactory;

    protected $table = 'produksi_rotaries';
    protected $primaryKey = 'id_produksi_rotary';

    protected $fillable = [
        'tanggal_produksi',
        'jam_mulai_mesin',
        'jam_selesai_mesin',
        'kendala',
        'status_data',
    ];

    // Relasi ke detail lahan
    public function lahans()
    {
        return $this->hasMany(ProduksiRotaryLahan::class, 'id_produksi_rotary', 'id_produksi_rotary');
    }

    // Relasi ke detail pegawai
    public function pegawais()
    {
        return $this->hasMany(ProduksiRotaryPegawai::class, 'id_produksi_rotary', 'id_produksi_rotary');
    }
    public function produksiRotaryLahans()
    {
        return $this->hasMany(ProduksiRotaryLahan::class, 'id_produksi_rotary');
    }

    public function produksiRotaryPegawais()
    {
        return $this->hasMany(ProduksiRotaryPegawai::class, 'id_produksi_rotary');
    }
}
