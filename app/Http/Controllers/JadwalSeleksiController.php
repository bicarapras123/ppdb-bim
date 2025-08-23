<?php

namespace App\Http\Controllers;

use App\Models\JadwalSeleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalSeleksiController extends Controller
{
    // 📌 Tampilkan semua jadwal
    public function index()
    {
        $jadwal = JadwalSeleksi::orderBy('tanggal', 'asc')->get();
        return view('admin.jadwal-seleksi.index', compact('jadwal'));
    }

    // 📌 Form tambah
    public function create()
    {
        return view('admin.jadwal-seleksi.create');
    }

    // 📌 Simpan jadwal baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_seleksi' => 'required',
            'tanggal'      => 'required|date',
            'waktu'        => 'nullable',
            'lokasi'       => 'nullable',
            'keterangan'   => 'nullable',
        ]);

        JadwalSeleksi::create($request->all());

        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal seleksi berhasil ditambahkan.');
    }

    // 📌 Detail jadwal
    public function show(JadwalSeleksi $jadwal)
    {
        return view('admin.jadwal-seleksi.show', compact('jadwal'));
    }

    // 📌 Form edit
    public function edit(JadwalSeleksi $jadwal)
    {
        return view('admin.jadwal-seleksi.edit', compact('jadwal'));
    }

    // 📌 Update jadwal
    public function update(Request $request, JadwalSeleksi $jadwal)
    {
        $request->validate([
            'nama_seleksi' => 'required',
            'tanggal'      => 'required|date',
            'waktu'        => 'nullable',
            'lokasi'       => 'nullable',
            'keterangan'   => 'nullable',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal seleksi berhasil diperbarui.');
    }

    // 📌 Hapus jadwal
    public function destroy(JadwalSeleksi $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal seleksi berhasil dihapus.');
    }
}
 