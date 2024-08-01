<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaprodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kode_dosen',
        'nip',
        'name', 
    ];

    public function User(){
        return $this->belongsTo(User::class); 
    }
}