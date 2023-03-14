<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;

    public function reservasi_ruang()
    {
        return $this->belongsToMany(Reservasi_ruang::class,'reservasi_ruang_sesi','sesi_id','reservasi_ruang_id' );
    }
}
