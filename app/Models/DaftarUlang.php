<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarUlang extends Model
{
    protected $table = 'daftar_ulang';

    protected $fillable = [
        'siswa_id',
        'nama_siswa',
        'status',
        'bukti_pembayaran',
    ];
}
