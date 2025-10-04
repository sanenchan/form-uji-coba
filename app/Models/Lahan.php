<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Lahan extends Model
{

    protected $table = 'lahans';

    // Primary key (opsional, default 'id')
    protected $primaryKey = 'id_lahan';

    // Kolom yang boleh diisi mass-assignment
    protected $fillable = [
        'kode_lahan',
        'nama_lahan',
    ];
    public function stokKayus()
    {
        return $this->hasMany(\App\Models\StokKayu::class, 'id_lahan', 'id_lahan');
    }
    public function produksiRotaries()
    {
        return $this->hasMany(ProduksiRotary::class, 'id_lahan', 'id_lahan');
    }
 // ✅ ini tempatnya
    protected $appends = ['kode_nama'];

    // Accessor
    public function getKodeNamaAttribute()
    {
        return "{$this->kode_lahan} - {$this->nama_lahan}";
    }

}


