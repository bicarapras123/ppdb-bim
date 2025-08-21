<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;

class KepsekController extends Controller
{
    public function dashboard()
    {
        return view('kepsek.dashboard');
    }

    public function laporan()
    {
        $jumlah = Pendaftaran::count();
        return view('kepsek.laporan', compact('jumlah'));
    }
}
