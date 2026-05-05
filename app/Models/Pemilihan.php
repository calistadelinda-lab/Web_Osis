<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemilihan extends Model
{
    protected $fillable = [
        'Nama_Ketua',
        'Nama_Wakil',
        'Foto_Ketua',
        'Foto_Wakil',
        'Jumlah_Suara',
        'Visi',
        'Misi',
    ];
}
