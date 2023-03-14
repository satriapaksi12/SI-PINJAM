<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    public function reservasi_ruang(){
        return $this->hasMany(Reservasi_ruang::class);
    }
}
