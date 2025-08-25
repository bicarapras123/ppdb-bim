<?php

namespace App\Http\Controllers;

use App\Models\PengumumanSeleksi;
use Illuminate\Http\Request;

class PengumumanSeleksiController extends Controller
{
    // Tampilkan semua pengumuman
    public function index()
    {
        $pengumuman = PengumumanSeleksi::latest()->get();
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    // Form tambah pengumuman
    public function create()
    {
        return view('admin.pengumuman.create');
    }

    // Simpan pengumuman baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'status' => 'required|in:draft,publish',
            'tanggal_pengumuman' => 'required|date',
            'tanggal_terakhir' => 'required|date', // ✅ tambahkan
        ]);

        PengumumanSeleksi::create($request->all());

        return redirect()->route('admin.pengumuman.index')
                         ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    // Form edit
    public function edit($id)
    {
        $pengumuman = PengumumanSeleksi::findOrFail($id);
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $pengumuman = PengumumanSeleksi::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'status' => 'required|in:draft,publish',
            'tanggal_pengumuman' => 'required|date',
            'tanggal_terakhir' => 'required|date', // ✅ tambahkan
        ]);

        $pengumuman->update($request->all());

        return redirect()->route('admin.pengumuman.index')
                         ->with('success', 'Pengumuman berhasil diperbarui');
    }

    // Hapus pengumuman
    public function destroy($id)
    {
        $pengumuman = PengumumanSeleksi::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('admin.pengumuman.index')
                         ->with('success', 'Pengumuman berhasil dihapus');
    }
}
