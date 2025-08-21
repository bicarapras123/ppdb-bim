<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'nama',
        'nisn',          // ✅ ditambahkan
        'asal_sekolah',  // ✅ ditambahkan
        'jurusan',       // ✅ ditambahkan
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'email',
        'telepon',
        'foto',
        'password',
    ];
}
