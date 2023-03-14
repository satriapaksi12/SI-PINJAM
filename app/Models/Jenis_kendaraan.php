<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_kendaraan extends Model
{
    use HasFactory;

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }
}
