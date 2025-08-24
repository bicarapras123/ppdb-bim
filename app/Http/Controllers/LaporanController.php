<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\DaftarUlang;
use App\Models\JadwalSeleksi;
use App\Models\NilaiSiswa;
use App\Models\PengumumanSeleksi;

class LaporanController extends Controller
{
    public function index()
    {
        // Rekap pendaftaran
        $totalPendaftar = Pendaftaran::count();
        $diterima       = Pendaftaran::where('status', 'diterima')->count();
        $ditolak        = Pendaftaran::where('status', 'ditolak')->count();
        $pending        = Pendaftaran::where('status', 'pending')->count();

        // Rekap daftar ulang
        $totalDaftarUlang = DaftarUlang::count();
        $sudahDaftarUlang = DaftarUlang::where('status', 'diterima')->count();
        $belumDaftarUlang = $totalPendaftar - $sudahDaftarUlang;

        // Data lain
        $kekurangan  = JadwalSeleksi::all();
        $pendaftaran = Pendaftaran::all();
        $nilai       = NilaiSiswa::all();
        $pengumuman  = PengumumanSeleksi::all();

        // 🔹 Koleksi daftar ulang untuk dipakai di tabel pada view
        $daftarUlang = DaftarUlang::all(); // atau ->latest()->get();

        return view('kepsek.laporan.index', compact(
            'totalPendaftar',
            'diterima',
            'ditolak',
            'pending',
            'totalDaftarUlang',
            'sudahDaftarUlang',
            'belumDaftarUlang',
            'kekurangan',
            'pendaftaran',
            'nilai',
            'pengumuman',
            'daftarUlang' // ← tambahkan ini
        ));
    }
}
