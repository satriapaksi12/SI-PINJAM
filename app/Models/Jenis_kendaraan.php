<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_kendaraan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_jenis_kendaraan'  // memberi tau kolom mana aja yang boleh diisi
    ];
    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }
}
