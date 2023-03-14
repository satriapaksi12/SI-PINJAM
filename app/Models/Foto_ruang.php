<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_ruang extends Model
{
    use HasFactory;

    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }
}
