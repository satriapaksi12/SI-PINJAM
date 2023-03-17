<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_gedung','lokasi_id'  // memberi tau kolom mana aja yang boleh diisi
    ];
    public function ruang()
    {
        return $this->hasMany(Ruang::class);
    }

    public function alat()
    {
        return $this->hasMany(Alat::class);
    }

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}
