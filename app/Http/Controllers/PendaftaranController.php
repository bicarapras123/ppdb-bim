<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('registrasi'); // tampilan form
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required',
            'nisn'          => 'required|unique:pendaftaran,nisn',  // ✅ tambahkan
            'asal_sekolah'  => 'required',                          // ✅ tambahkan
            'jurusan'       => 'required',                          // ✅ tambahkan
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'alamat'        => 'required',
            'email'         => 'required|email|unique:pendaftaran,email',
            'telepon'       => 'required',
            'password'      => 'required|confirmed|min:6',
            'foto'          => 'nullable|image|max:2048',
        ]);
    
        // hanya ambil field yang sesuai dengan tabel
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
    
        // upload foto jika ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }
    
        Pendaftaran::create($data);
    
        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
