<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSeleksi extends Model
{
    use HasFactory;

    // Table yang dipakai (otomatis "jadwal_seleksis", jadi bisa dikosongkan kalau ikut konvensi)
    protected $table = 'jadwal_seleksi';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama_seleksi',
        'tanggal',
        'waktu',
        'lokasi',
        'keterangan',
    ];
}
