<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use Illuminate\Http\Request;

class JadwalSeleksiController extends Controller
{
    // 📌 Tampilkan semua jadwal (ambil dari daftar ulang siswa)
    public function index()
    {
        $jadwal = DaftarUlang::select(
            'id',
            'nama_siswa',
            'bukti_pembayaran',
            'nilai',                     // ✅ tambahkan kolom nilai
            'created_at as tanggal',
            'status as keterangan'
        )
        ->orderBy('created_at', 'asc')
        ->get();
    
        return view('admin.jadwal-seleksi.index', compact('jadwal'));
    }
    
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
            'nama_siswa'  => 'required|string|max:100',
            'keterangan'  => 'required|in:pending,diterima,ditolak',
        ]);

        $jadwal = DaftarUlang::findOrFail($id);
        $jadwal->update([
            'nama_siswa'       => $request->nama_siswa,
            'status'           => $request->keterangan,
            // ✅ jika ada upload file nilai
            'nilai'            => $request->hasFile('nilai')
                                    ? $request->file('nilai')->store('nilai', 'public')
                                    : $jadwal->nilai,
            // ✅ jika ada upload file bukti pembayaran
            'bukti_pembayaran' => $request->hasFile('bukti_pembayaran')
                                    ? $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public')
                                    : $jadwal->bukti_pembayaran,
        ]);

        return redirect()->route('admin.jadwal-seleksi.index')
                         ->with('success', 'Jadwal seleksi berhasil diperbarui.');
    }

    // 📌 Hapus jadwal
    public function destroy($id)
    {
        $jadwal = DaftarUlang::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal-seleksi.index')
                         ->with('success', 'Jadwal seleksi berhasil dihapus.');
    }

    // 📌 Update status lewat dropdown atau tombol
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diterima,ditolak'
        ]);

        $jadwal = DaftarUlang::findOrFail($id);
        $jadwal->status = $request->status;
        $jadwal->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}
