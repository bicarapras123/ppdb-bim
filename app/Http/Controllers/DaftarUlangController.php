<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use Illuminate\Http\Request;

class DaftarUlangController extends Controller
{
    public function index()
    {
        // Ambil langsung dari tabel daftar_ulang
        $daftarUlangs = DaftarUlang::latest()->get();
        return view('daftar-ulang.index', compact('daftarUlangs'));
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

        // Saat simpan file
        $bukti = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        DaftarUlang::create([
            'siswa_id'         => $request->siswa_id,
            'status'           => 'pending',
            'bukti_pembayaran' => $bukti,
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
            'siswa_id' => $request->siswa_id,
            'status'   => $request->status,
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
