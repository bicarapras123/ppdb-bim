@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">📋 Daftar Siswa Baru</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 text-sm">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="border p-2">No</th>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">NISN</th>
                    <th class="border p-2">TTL</th>
                    <th class="border p-2">Jenis Kelamin</th>
                    <th class="border p-2">Agama</th>
                    <th class="border p-2">Alamat</th>
                    <th class="border p-2">Asal Sekolah</th>
                    <th class="border p-2">Jurusan</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Telepon</th>
                    <th class="border p-2">Foto</th>
                    <th class="border p-2">Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendaftaran as $index => $siswa)
                <tr>
                    <td class="border p-2">{{ $index + 1 }}</td>
                    <td class="border p-2">{{ $siswa->nama }}</td>
                    <td class="border p-2">{{ $siswa->nisn }}</td>
                    <td class="border p-2">{{ $siswa->tempat_lahir }}, {{ $siswa->tanggal_lahir }}</td>
                    <td class="border p-2">{{ $siswa->jenis_kelamin }}</td>
                    <td class="border p-2">{{ $siswa->agama }}</td>
                    <td class="border p-2">{{ $siswa->alamat }}</td>
                    <td class="border p-2">{{ $siswa->asal_sekolah }}</td>
                    <td class="border p-2">{{ $siswa->jurusan }}</td>
                    <td class="border p-2">{{ $siswa->email }}</td>
                    <td class="border p-2">{{ $siswa->telepon }}</td>
                    <td class="border p-2">
                        @if($siswa->foto)
                            <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto" class="h-16 rounded">
                        @else
                            -
                        @endif
                    </td>
                    <td class="border p-2">{{ $siswa->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
