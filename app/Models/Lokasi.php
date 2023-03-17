<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lokasi'  // memberi tau kolom mana aja yang boleh diisi
    ];
    public function gedung()
    {
        return $this->hasMany(Gedung::class);
    }
}
