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

    /**
     * Relasi ke tabel pendaftaran
     * siswa_id di daftar_ulang -> nisn di pendaftaran
     */
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'siswa_id', 'nisn');
    }
    public function jadwalSeleksi()
{
    return $this->belongsTo(JadwalSeleksi::class, 'jadwal_seleksi_id');
}


}
