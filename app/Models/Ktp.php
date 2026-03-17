<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ktp extends Model
{
    protected $fillable = [
        'nik',
        'nama',
        'tanggal_lahir',
        'umur',
        'alamat',
        'foto'
    ];
}
