<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guarded = [
        'id',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function reservasi_ruang()
    {
        return $this->hasMany(Reservasi_ruang::class);
    }

    public function reservasi_kendaraan()
    {
        return $this->hasMany(Reservasi_kendaraan::class);
    }

    public function reservasi_alat()
    {
        return $this->hasMany(Reservasi_alat::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
