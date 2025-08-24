<?php

namespace App\Http\Controllers;

use App\Models\JadwalSeleksi;
use App\Models\DaftarUlang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalSeleksiController extends Controller
{
    // 📌 Tampilkan semua jadwal (ambil dari daftar ulang siswa)
    public function index()
    {
        $jadwal = DaftarUlang::select(
            'id',
            'nama_siswa',
            'created_at as tanggal',   // pakai created_at sebagai tanggal seleksi
            'status as keterangan'     // pakai status untuk keterangan
        )
        ->orderBy('created_at', 'asc')
        ->get();

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
            'nama_siswa'  => 'required',
            'tanggal'     => 'required|date',
            'waktu'       => 'nullable',
            'lokasi'      => 'nullable',
            'keterangan'  => 'nullable',
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
    public function updateStatus(Request $request, $id)
{
    $jadwal = Jadwal::findOrFail($id);

    // Jika pakai Dropdown (ambil dari form)
    if ($request->has('keterangan')) {
        $jadwal->keterangan = $request->keterangan;
    }

    // Jika pakai Tombol Cepat (ambil dari route param kedua)
    if ($request->status) {
        $jadwal->keterangan = $request->status;
    }

    $jadwal->save();

    return redirect()->back()->with('success', 'Status berhasil diperbarui');
}

}
