<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use App\Models\JadwalSeleksi;
use Illuminate\Http\Request;

class DaftarUlangController extends Controller
{
    public function index()
    {
        // Ambil data daftar ulang + join ke jadwal seleksi
        $daftarUlangs = DaftarUlang::with('jadwalSeleksi')->latest()->get();
    
        // Ambil semua data dari tabel jadwal_seleksi + relasi daftar ulang
        $jadwalSeleksi = JadwalSeleksi::with('daftarUlang')->latest()->get();
    
        return view('daftar-ulang.index', compact('daftarUlangs', 'jadwalSeleksi'));
    }
    

    public function create()
    {
        return view('daftar-ulang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'         => 'required|integer',
            'bukti_pembayaran' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $siswa = \App\Models\Pendaftaran::where('nisn', $request->siswa_id)->first();

        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan!');
        }

        $bukti = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        DaftarUlang::create([
            'siswa_id'         => $request->siswa_id,
            // 🔑 tidak perlu simpan nama_siswa manual lagi
            'status'           => 'pending',
            'bukti_pembayaran' => $bukti,
            // pastikan ada field jadwal_seleksi_id di tabel daftar_ulangs
            'jadwal_seleksi_id' => $request->jadwal_seleksi_id ?? null,
        ]);

        return redirect()->route('daftar-ulang.index')
                         ->with('success', 'Daftar ulang berhasil diajukan!');
    }

    public function edit(DaftarUlang $daftarUlang)
    {
        return view('daftar-ulang.edit', compact('daftarUlang'));
    }

    public function update(Request $request, DaftarUlang $daftarUlang)
    {
        $request->validate([
            'siswa_id'         => 'required|integer',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'status'           => 'required|string',
        ]);

        $data = [
            'siswa_id'          => $request->siswa_id,
            'status'            => $request->status,
            'jadwal_seleksi_id' => $request->jadwal_seleksi_id ?? $daftarUlang->jadwal_seleksi_id,
        ];

        if ($request->hasFile('bukti_pembayaran')) {
            $data['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        $daftarUlang->update($data);

        return redirect()->route('daftar-ulang.index')
                         ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(DaftarUlang $daftarUlang)
    {
        $daftarUlang->delete();
        return redirect()->route('daftar-ulang.index')
                         ->with('success', 'Data berhasil dihapus!');
    }
}
