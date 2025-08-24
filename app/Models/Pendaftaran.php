<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran'; 

    protected $fillable = [
        'nama',   // ⚡ ini harus sesuai nama kolom di DB
        'nisn',
        'asal_sekolah',
        'jurusan',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'email',
        'telepon',
        'foto',
        'password',
        'status',
        'dokumen_pdf',
        'user_id'       // kalau memang ada hubungan ke user
    ];

    // Contoh relasi ke daftar ulang
    public function daftarUlang()
    {
        return $this->hasOne(DaftarUlang::class, 'siswa_id');
    }
}
