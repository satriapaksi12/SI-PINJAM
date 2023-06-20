<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_unit','telepon','email'
    ];
    public function user(){
        return $this->hasMany(User::class);
    }

    public function reservasi_ruang(){
        return $this->hasMany(Reservasi_ruang::class);
    }

    public function reservasi_kendaraan(){
        return $this->hasMany(Reservasi_kendaraan::class);
    }

    public function reservasi_alat(){
        return $this->hasMany(Reservasi_alat::class);
    }
}
