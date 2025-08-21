@extends('kepsek.dashboard')

@section('content')
    <h2 class="text-xl font-bold mb-4">Laporan Pendaftar</h2>
    <div class="bg-white shadow rounded-lg p-6">
        <p class="text-gray-700">Total jumlah pendaftar: <span class="font-bold">{{ $jumlah }}</span></p>
    </div>
@endsection
