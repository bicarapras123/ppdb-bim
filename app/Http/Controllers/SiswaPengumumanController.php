<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaPengumumanController extends Controller
{
    public function index(Request $request)
    {
        // Query dasar: ambil nilai per siswa (total nilai & status kelulusan akhir)
        $query = DB::table('nilai_siswas')
            ->select(
                'siswa_id',
                'nama_siswa',
                DB::raw('SUM(nilai) as nilai'),
                DB::raw('MAX(status_kelulusan) as status_kelulusan')
            )
            ->groupBy('siswa_id', 'nama_siswa');

        // Filter search (NISN / Nama Siswa)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('siswa_id', 'like', "%{$search}%")
                  ->orWhere('nama_siswa', 'like', "%{$search}%");
            });
        }

        $nilaiSiswas = $query->get();

        return view('pengumuman-siswa', compact('nilaiSiswas'));
    }
}
