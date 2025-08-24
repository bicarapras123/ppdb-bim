<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\PengumumanSeleksi;
use App\Models\DaftarUlang;
use App\Models\NilaiSiswa; // ✅ tambahkan model NilaiSiswa

class KepsekController extends Controller
{
    // Dashboard Kepsek
    public function dashboard()
    {
        $totalPendaftar   = Pendaftaran::count();
        $totalLulus       = NilaiSiswa::whereRaw('LOWER(status_kelulusan) = ?', ['lulus'])->count();
        $totalTidakLulus  = NilaiSiswa::whereRaw('LOWER(status_kelulusan) = ?', ['tidak lulus'])->count();
        $totalDaftarUlang = DaftarUlang::count();
    
        // Tambahan untuk grafik
        $daftarUlang = DaftarUlang::with('pendaftaran')->get();
        $nilaiSiswas = NilaiSiswa::all();
    
        $pengumuman = PengumumanSeleksi::latest()->get();
    
        return view('kepsek.dashboard', compact(
            'totalPendaftar',
            'totalLulus',
            'totalTidakLulus',
            'totalDaftarUlang',
            'daftarUlang',
            'nilaiSiswas',
            'pengumuman'
        ));
    }
    

    // Laporan Kepsek
    public function laporan()
    {
        // Data utama
        $totalPendaftar   = Pendaftaran::count();
        $totalLulus = NilaiSiswa::whereRaw('LOWER(status_kelulusan) = ?', ['lulus'])->count();
        $totalTidakLulus = NilaiSiswa::whereRaw('LOWER(status_kelulusan) = ?', ['tidak lulus'])->count();        
        $totalDaftarUlang = DaftarUlang::count();

        // Data untuk tabel
        $pendaftaran = Pendaftaran::all();
        $pengumuman  = PengumumanSeleksi::all();
        $daftarUlang = DaftarUlang::with('pendaftaran')->get();

        // ambil semua nilai siswa agar bisa ditampilkan di tabel bawah
        $nilaiSiswas = NilaiSiswa::all();

        return view('kepsek.laporan.index', compact(
            'totalPendaftar',
            'totalLulus',
            'totalTidakLulus',
            'totalDaftarUlang',
            'pendaftaran',
            'pengumuman',
            'daftarUlang',
            'nilaiSiswas'
        ));
    }
}