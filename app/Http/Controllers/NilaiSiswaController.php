<?php

namespace App\Http\Controllers;

use App\Models\NilaiSiswa;
use Illuminate\Http\Request;

class NilaiSiswaController extends Controller
{
    public function index()
    {
        $nilai = NilaiSiswa::all();
        return view('admin.nilai.index', compact('nilai'));
    }

    public function create()
    {
        return view('admin.nilai.create');
    }

    public function store(Request $request)
    {
        // langsung simpan data tanpa validasi ribet
        NilaiSiswa::create([
            'siswa_id'        => $request->siswa_id,
            'nama_siswa'      => $request->nama_siswa,
            'mapel'           => $request->mapel,
            'nilai'           => $request->nilai,
            'status_kelulusan'=> $request->status_kelulusan,
        ]);

        return redirect()->route('admin.nilai.index')
                         ->with('success', 'Nilai berhasil ditambahkan');
    }

    public function edit(NilaiSiswa $nilai)
    {
        return view('admin.nilai.edit', compact('nilai'));
    }

    public function update(Request $request, NilaiSiswa $nilai)
    {
        $nilai->update([
            'siswa_id'        => $request->siswa_id,
            'nama_siswa'      => $request->nama_siswa,
            'mapel'           => $request->mapel,
            'nilai'           => $request->nilai,
            'status_kelulusan'=> $request->status_kelulusan,
        ]);

        return redirect()->route('admin.nilai.index')
                         ->with('success', 'Nilai berhasil diupdate');
    }

    public function destroy(NilaiSiswa $nilai)
    {
        $nilai->delete();
        return redirect()->route('admin.nilai.index')
                         ->with('success', 'Nilai berhasil dihapus');
    }
}
