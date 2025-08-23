<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'mapel_id',
        'nilai',
        'status_kelulusan',
    ];
    
}    
