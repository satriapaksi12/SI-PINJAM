<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public function reservasi_alat()
    {
        return $this->hasMany(Reservasi_alat::class);
    }

    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }

    public function foto_alat()
    {
        return $this->hasMany(Foto_alat::class, 'id', 'foto_alat_id');
    }
}
