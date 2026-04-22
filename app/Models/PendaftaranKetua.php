<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranKetua extends Model
{
    protected $table = 'pendaftaran_ketuas';

    protected $fillable = [
       'nama', 'nisn', 'kelas', 'no_hp',
    'jabatan', 'visi', 'misi', 'motivasi'
    ];
}
