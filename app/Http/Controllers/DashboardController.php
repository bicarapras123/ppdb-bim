<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\PengumumanSeleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total semua yang daftar
        $totalPendaftar = Pendaftaran::count();

        // Sudah diverifikasi -> ambil dari kolom status di tabel pendaftaran
        $sudahDiverifikasi = Pendaftaran::where('status', 'diverifikasi')->count();

        // Menunggu hasil (status_kelulusan masih null)
        $menungguHasil = DB::table('nilai_siswas')
            ->whereNull('status_kelulusan')
            ->count();

        // Lulus
        $lulus = DB::table('nilai_siswas')
            ->where('status_kelulusan', 'lulus')
            ->count();

        // Tidak Lulus
        $tidakLulus = DB::table('nilai_siswas')
            ->where('status_kelulusan', 'tidak lulus')
            ->count();

        // Ambil jadwal seleksi (kalau ada)
        $jadwal = PengumumanSeleksi::orderBy('tanggal_pengumuman', 'asc')->get();

        return view('dashboard', compact(
            'totalPendaftar',
            'sudahDiverifikasi',
            'menungguHasil',
            'lulus',
            'tidakLulus',
            'jadwal'
        ));
    }
}
