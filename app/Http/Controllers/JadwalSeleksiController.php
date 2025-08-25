<?php

namespace App\Http\Controllers;

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

    // 📌 Tidak perlu create/store kalau semua jadwal ambil dari daftar_ulang
    // bisa dihapus kalau tidak dipakai

    // 📌 Detail jadwal
    public function show($id)
    {
        $jadwal = DaftarUlang::findOrFail($id);
        return view('admin.jadwal-seleksi.show', compact('jadwal'));
    }

    // 📌 Form edit
    public function edit($id)
    {
        $jadwal = DaftarUlang::findOrFail($id);
        return view('admin.jadwal-seleksi.edit', compact('jadwal'));
    }

    // 📌 Update jadwal
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa'  => 'required',
            'tanggal'     => 'required|date',
            'keterangan'  => 'nullable',
        ]);

        $jadwal = DaftarUlang::findOrFail($id);
        $jadwal->update([
            'nama_siswa' => $request->nama_siswa,
            'status'     => $request->keterangan,  // status == keterangan
        ]);

        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal seleksi berhasil diperbarui.');
    }

    // 📌 Hapus jadwal (opsional, kalau boleh hapus dari daftar_ulang)
    public function destroy($id)
    {
        $jadwal = DaftarUlang::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal seleksi berhasil dihapus.');
    }

    // 📌 Update status lewat dropdown atau tombol
    public function updateStatus(Request $request, $id)
    {
        $jadwal = DaftarUlang::findOrFail($id);

        if ($request->has('keterangan')) {
            $jadwal->status = $request->keterangan; // status == keterangan
        }

        if ($request->status) {
            $jadwal->status = $request->status;
        }

        $jadwal->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }
}
