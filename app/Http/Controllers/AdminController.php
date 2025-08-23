<?php
namespace App\Http\Controllers;

use App\Models\Pendaftaran;

class AdminController extends Controller
{
    public function dashboard()
    {
        // ambil semua data pendaftaran dengan pagination
        $pendaftaran = Pendaftaran::latest()->paginate(10);
    
        // total tetap bisa dipakai
        $totalPendaftar = Pendaftaran::count();
    
        return view('admin.dashboard', compact('pendaftaran', 'totalPendaftar'));
    }
    

    public function pendaftaran()
    {
        // daftar lengkap dengan pagination
        $pendaftaran = Pendaftaran::latest()->paginate(10);

        return view('admin.pendaftaran', compact('pendaftaran'));
    }
}
