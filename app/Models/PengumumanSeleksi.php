<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanSeleksi extends Model
{
    use HasFactory;

    // karena migration pakai nama tabel "pengumuman_seleksis"
    protected $table = 'pengumuman_seleksis';

    protected $fillable = [
        'judul',
        'isi',
        'status',
        'tanggal_pengumuman',
    ];
}
