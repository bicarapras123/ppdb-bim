<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'nama_siswa',
        'mapel',
        'nilai',
        'status_kelulusan',
    ];
    
}    
