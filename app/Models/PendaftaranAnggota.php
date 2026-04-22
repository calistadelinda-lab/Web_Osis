<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranAnggota extends Model
{
    protected $table = 'pendaftaran_anggotas';

    protected $fillable = [
        'nama',
        'nisn',
        'kelas',
        'no_hp',
        'bidang',
        'pengalaman',
        'motivasi',
    ];
    
}
