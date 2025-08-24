<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    use HasFactory;
    protected $table = 'nilai_siswas'; // pastikan sesuai nama tabel di DB
    protected $fillable = [
        'siswa_id',
        'nama_siswa',
        'mapel',
        'nilai',
        'status_kelulusan',
    ];
    
        // relasi opsional
        public function pendaftaran()
        {
            return $this->belongsTo(Pendaftaran::class, 'siswa_id');
        }
}    
