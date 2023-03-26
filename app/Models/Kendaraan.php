<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_unit','telepon','email'  // memberi tau kolom mana aja yang boleh diisi
    ];

    public function reservasi_kendaraan()
    {
        return $this->hasMany(Reservasi_kendaraan::class);
    }

    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }

    public function jenis_kendaraan()
    {
        return $this->belongsTo(Jenis_kendaraan::class);
    }
}
