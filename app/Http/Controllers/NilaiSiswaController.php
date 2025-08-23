<?php

namespace App\Http\Controllers;

use App\Models\NilaiSiswa;
use Illuminate\Http\Request;

class NilaiSiswaController extends Controller
{
    public function index()
    {
        $nilai = NilaiSiswa::all();
        // ✅ arahkan ke resources/views/admin/nilai/index.blade.php
        return view('admin.nilai.index', compact('nilai'));
    }

    public function create()
    {
        // ✅ arahkan ke resources/views/admin/nilai/create.blade.php
        return view('admin.nilai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'   => 'required|integer',
            'nama_siswa' => 'required|string|max:255', // ✅ tambahkan nama_siswa
            'mapel'      => 'required|string|max:255',
            'nilai'      => 'required|integer|min:0|max:100',
        ]);

        NilaiSiswa::create($request->all());

        return redirect()->route('admin.nilai.index')->with('success', 'Nilai berhasil ditambahkan');
    }

    public function show(NilaiSiswa $nilai)
    {
        return view('admin.nilai.show', compact('nilai'));
    }

    public function edit(NilaiSiswa $nilai)
    {
        return view('admin.nilai.edit', compact('nilai'));
    }

    public function update(Request $request, NilaiSiswa $nilai)
    {
        $request->validate([
            'siswa_id'   => 'required|integer',
            'nama_siswa' => 'required|string|max:255', // ✅ tambahkan nama_siswa
            'mapel'      => 'required|string|max:255',
            'nilai'      => 'required|integer|min:0|max:100',
        ]);

        $nilai->update($request->all());

        return redirect()->route('admin.nilai.index')->with('success', 'Nilai berhasil diupdate');
    }

    public function destroy(NilaiSiswa $nilai)
    {
        $nilai->delete();

        return redirect()->route('admin.nilai.index')->with('success', 'Nilai berhasil dihapus');
    }
}
