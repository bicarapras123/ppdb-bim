<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use Illuminate\Http\Request;

class DaftarUlangController extends Controller
{
    public function index()
    {
        // Ambil semua data daftar ulang
        $daftar_ulang = DaftarUlang::all(); 

        return view('daftar-ulang.index', compact('daftar_ulang'));
    }

    public function create()
    {
        // Tampilkan form tambah daftar ulang
        return view('daftar-ulang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'nama_siswa' => 'required',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'nilai'            => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        //variable dari tampilan database daftar_ulang
        $data = $request->only(['siswa_id', 'nama_siswa']);
        $data['status'] = 'pending';

        if ($request->hasFile('bukti_pembayaran')) {
            $data['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        if ($request->hasFile('nilai')) {
            $data['nilai'] = $request->file('nilai')->store('nilai', 'public');
        }

        DaftarUlang::create([
            'siswa_id'          => $data['siswa_id'],
            'nama_siswa'        => $data['nama_siswa'],
            'status'            => $data['status'],
            'bukti_pembayaran'  => $data['bukti_pembayaran'] ?? null,
            'nilai'             => $data['nilai'] ?? null,
        ]);        
    
        return redirect()->route('daftar-ulang.index')->with('success', 'Data berhasil ditambahkan');
    }
    

    public function edit($id)
    {
        // Ambil data sesuai id
        $daftar_ulang = DaftarUlang::findOrFail($id);
        return view('daftar-ulang.edit', compact('daftar_ulang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn'             => 'required|string|max:20',
            'nama_siswa'       => 'required|string|max:100',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'nilai'            => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $daftar_ulang = DaftarUlang::findOrFail($id);

        $daftar_ulang->siswa_id   = $request->siswa_id;
        $daftar_ulang->nama_siswa = $request->nama_siswa;

        if ($request->hasFile('bukti_pembayaran')) {
            $daftar_ulang->bukti_pembayaran = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        if ($request->hasFile('nilai')) {
            $daftar_ulang->nilai = $request->file('nilai')->store('nilai', 'public');
        }

        $daftar_ulang->save();

        return redirect()->route('daftar-ulang.index')
                         ->with('success', 'Data daftar ulang berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $daftar_ulang = DaftarUlang::findOrFail($id);
        $daftar_ulang->delete();

        return redirect()->route('daftar-ulang.index')
                         ->with('success', 'Data berhasil dihapus!');
    }
}
