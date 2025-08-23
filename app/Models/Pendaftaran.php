<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    // Pastikan nama tabel sesuai di database
    protected $table = 'pendaftaran'; 

    // Jika primary key bukan 'id', tambahkan
    // protected $primaryKey = 'id_pendaftaran';

    // Kalau tidak pakai created_at & updated_at, matikan timestamps
    // public $timestamps = false;

    protected $fillable = [
        'nama',
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
        'status', // ✅ disarankan tambahkan untuk kebutuhan verifikasi / menunggu hasil
        'dokumen_pdf',
    ];
}
