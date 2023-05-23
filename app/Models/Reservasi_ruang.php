<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi_ruang extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }

    public function sesi()
    {
        return $this->belongsToMany(Sesi::class,'reservasi_ruang_sesi','reservasi_ruang_id','sesi_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function jenis_acara()
    {
        return $this->belongsTo(Jenis_acara::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
