<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\PengumumanSeleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil email dari session login
        $email = session('user_email');
    
        // Ambil data siswa dari tabel pendaftaran sesuai email login
        $pendaftaran = null;
        if ($email) {
            $pendaftaran = Pendaftaran::where('email', $email)->first();
        }
    
        // Hitung total semua yang daftar (opsional, kalau hanya admin yang butuh)
        $totalPendaftar = Pendaftaran::count();
        $sudahDiverifikasi = Pendaftaran::where('status', 'verifikasi')->count();
        $menungguHasil = Pendaftaran::where('status', 'pending')->count();
    
        $lulus = DB::table('nilai_siswas')
            ->where('status_kelulusan', 'lulus')
            ->count();
    
        $tidakLulus = DB::table('nilai_siswas')
            ->where('status_kelulusan', 'tidak lulus')
            ->count();
    
        $jadwal = PengumumanSeleksi::orderBy('tanggal_pengumuman', 'asc')->get();
    
        return view('dashboard', compact(
            'pendaftaran',
            'totalPendaftar',
            'sudahDiverifikasi',
            'menungguHasil',
            'lulus',
            'tidakLulus',
            'jadwal'
        ));
    }
}