<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_alat extends Model
{
    use HasFactory;
    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }
}
