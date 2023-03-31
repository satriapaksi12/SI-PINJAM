<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_alat','no_inventaris','foto_alat_id','gedung_id'  // memberi tau kolom mana aja yang boleh diisi
    ];

    public function reservasi_alat()
    {
        return $this->hasMany(Reservasi_alat::class);
    }

    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }

    public function foto_alat()
    {
        return $this->hasMany(Foto_alat::class, 'id', 'foto_alat_id');
    }
}
