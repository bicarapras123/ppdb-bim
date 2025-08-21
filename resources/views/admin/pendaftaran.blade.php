@extends('admin.dashboard')

@section('content')
    <h2 class="text-xl font-bold mb-4">Data Pendaftar</h2>
    <table class="w-full border border-gray-200 text-sm">
        <thead class="bg-green-700 text-white">
            <tr>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">NISN</th>
                <th class="px-4 py-2">Asal Sekolah</th>
                <th class="px-4 py-2">Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftaran as $p)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $p->nama }}</td>
                    <td class="px-4 py-2">{{ $p->nisn }}</td>
                    <td class="px-4 py-2">{{ $p->asal_sekolah }}</td>
                    <td class="px-4 py-2">{{ $p->jurusan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $pendaftaran->links() }}
    </div>
@endsection
