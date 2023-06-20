<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_ruang','kapasitas','fasilitas','foto_ruang_id','gedung_id'  // memberi tau kolom mana aja yang boleh diisi
    ];
    public function reservasi_ruang(){
        //Nama model, fk yang di tabel yang dituju, id  dari tabel asal
        return $this->hasMany(Reservasi_ruang::class);
    }
    public function foto_ruang()
    {
        return $this->hasMany(Foto_ruang::class, 'id', 'foto_ruang_id');
    }
    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }
}
