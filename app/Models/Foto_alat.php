<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_alat extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function alat()
    {
        return $this->belongsTo(Alat::class, 'alat_id', 'id');
    }
}
