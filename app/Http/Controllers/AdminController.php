<?php
namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\JadwalSeleksi; // ✅ tambahkan ini

class AdminController extends Controller
{
    public function dashboard()
    {
        // ambil semua data pendaftaran dengan pagination
        $pendaftaran = Pendaftaran::latest()->paginate(10);
    
        // total pendaftar
        $totalPendaftar = Pendaftaran::count();

        // ambil data jadwal seleksi
        $jadwal = JadwalSeleksi::orderBy('tanggal', 'asc')->get(); // sesuaikan nama kolom tanggal

        return view('admin.dashboard', compact('pendaftaran', 'totalPendaftar', 'jadwal'));
    }
}
