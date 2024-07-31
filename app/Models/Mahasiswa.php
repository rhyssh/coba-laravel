<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'kelas_id',
        'nim',
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'edit',
    ];

    protected $casts = [
        'edit' => 'boolean',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
