<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    public function kaprodi(){
        return $this->hasOne(Kaprodi::class); 
    }

    public function mahasiswa(){
        return $this->hasOne(Mahasiswa::class); 
    }

    public function dosen(){
        return $this->hasOne(Dosen::class); 
    }
}
