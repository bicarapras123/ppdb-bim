<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // ✅ Tambahkan logging

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('registrasi'); // tampilan form registrasi
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required',
            'nisn'          => 'required|unique:pendaftaran,nisn',
            'asal_sekolah'  => 'required',
            'jurusan'       => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'alamat'        => 'required',
            'email'         => 'required|email|unique:pendaftaran,email',
            'telepon'       => 'required',
            'password'      => 'required|confirmed|min:6',

            // File upload
            'foto'          => 'nullable|image|max:2048',
            'dokumen_pdf'   => 'nullable|mimes:pdf|max:5120', // max 5MB
        ]);
    
        // Data dasar
        $data = $request->only([
            'nama',
            'nisn',
            'asal_sekolah',
            'jurusan',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'agama',
            'alamat',
            'email',
            'telepon',
        ]);
    
        // hash password
        $data['password'] = bcrypt($request->password);

        // Default status = pending
        $data['status'] = 'pending';
    
        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        // Upload dokumen PDF jika ada
        if ($request->hasFile('dokumen_pdf')) {
            $path = $request->file('dokumen_pdf')->store('dokumen_pdf', 'public');
            $data['dokumen_pdf'] = $path;

            // ✅ Debug logging
            Log::info('PDF berhasil diupload: '.$path);
        } else {
            // ✅ Debug logging
            Log::warning('Tidak ada dokumen_pdf yang terupload!');
        }

        // ✅ Debug cek isi array
        Log::info('Data sebelum disimpan: ', $data);
        // dd($data); // <-- Uncomment sementara untuk cek di browser

        Pendaftaran::create($data);
    
        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function verifikasi($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->status = 'diverifikasi';
        $pendaftaran->save();

        return redirect()->back()->with('success', 'Pendaftaran berhasil diverifikasi.');
    }

    public function tolak($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->status = 'ditolak';
        $pendaftaran->save();

        return redirect()->back()->with('success', 'Pendaftaran berhasil ditolak.');
    }
}
