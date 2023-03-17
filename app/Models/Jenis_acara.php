<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_acara extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jenis_acara'  // memberi tau kolom mana aja yang boleh diisi
    ];
    public function reservasi_ruang(){
        return $this->hasMany(Reservasi_ruang::class);
    }
}
