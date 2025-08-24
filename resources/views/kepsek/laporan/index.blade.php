{{-- resources/views/kepsek/laporan/index.blade.php --}}
<x-sidebar-kepsek>
    <div class="max-w-7xl mx-auto bg-white shadow-xl rounded-2xl p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-8 text-center">
            Laporan Keseluruhan PPDB
        </h1>

        {{-- Statistik ringkas --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
            <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-400 rounded-xl shadow-lg text-white text-center">
                <p class="text-sm opacity-90">Total Pendaftar</p>
                <p class="text-2xl font-bold">{{ $totalPendaftar ?? 0 }}</p>
            </div>
            <div class="p-6 bg-gradient-to-r from-green-500 to-green-400 rounded-xl shadow-lg text-white text-center">
                <p class="text-sm opacity-90">Lulus Seleksi</p>
                <p class="text-2xl font-bold">{{ $totalLulus ?? 0 }}</p>
            </div>
            <div class="p-6 bg-gradient-to-r from-red-500 to-red-400 rounded-xl shadow-lg text-white text-center">
                <p class="text-sm opacity-90">Tidak Lulus</p>
                <p class="text-2xl font-bold">{{ $totalTidakLulus ?? 0 }}</p>
            </div>
            <div class="p-6 bg-gradient-to-r from-yellow-500 to-yellow-400 rounded-xl shadow-lg text-white text-center">
                <p class="text-sm opacity-90">Daftar Ulang</p>
                <p class="text-2xl font-bold">{{ $totalDaftarUlang ?? 0 }}</p>
            </div>
        </div>

        {{-- Grid untuk tabel-tabel --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Tabel Pendaftar --}}
            <div class="border rounded-xl shadow-sm p-4">
                <h2 class="text-lg font-semibold mb-3 text-center">Data Pendaftar</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm border">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-3 py-2 border">Nama</th>
                                <th class="px-3 py-2 border">Email</th>
                                <th class="px-3 py-2 border">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pendaftaran as $p)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2 border">{{ $p->nama }}</td>
                                    <td class="px-3 py-2 border">{{ $p->email }}</td>
                                    <td class="px-3 py-2 border text-center">
                                        <span class="px-2 py-1 text-xs rounded-lg
                                            @if($p->status=='diterima') bg-green-100 text-green-700
                                            @elseif($p->status=='ditolak') bg-red-100 text-red-700
                                            @else bg-gray-100 text-gray-700 @endif">
                                            {{ ucfirst($p->status ?? 'Pending') }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center py-2 text-gray-500">Belum ada data</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Tabel Pengumuman --}}
            <div class="border rounded-xl shadow-sm p-4">
                <h2 class="text-lg font-semibold mb-3 text-center">Pengumuman Jadwal</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm border">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-3 py-2 border">Judul</th>
                                <th class="px-3 py-2 border">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengumuman as $pg)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2 border">{{ $pg->judul }}</td>
                                    <td class="px-3 py-2 border">{{ $pg->created_at->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="2" class="text-center py-2 text-gray-500">Belum ada pengumuman</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Tabel Daftar Ulang --}}
            <div class="border rounded-xl shadow-sm p-4">
                <h2 class="text-lg font-semibold mb-3 text-center">Daftar Ulang</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm border">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-3 py-2 border">Nama</th>
                                <th class="px-3 py-2 border">Bukti</th>
                                <th class="px-3 py-2 border">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($daftarUlang as $d)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2 border">{{ $d->pendaftaran->nama ?? '-' }}</td>
                                    <td class="px-3 py-2 border text-center">
                                        <a href="{{ asset('storage/'.$d->bukti_pembayaran) }}" target="_blank" 
                                           class="text-blue-600 hover:underline">Lihat</a>
                                    </td>
                                    <td class="px-3 py-2 border text-center">
                                        <span class="px-2 py-1 text-xs rounded-lg bg-indigo-100 text-indigo-700">
                                            {{ ucfirst($d->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-2 text-gray-500">Belum ada daftar ulang</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
{{-- Data Lulus & Tidak Lulus --}}
<div class="bg-white shadow rounded-lg p-6 mt-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Data Lulus & Tidak Lulus</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-3 py-2 border">NISN</th>
                    <th class="px-3 py-2 border">Nama Siswa</th>
                    <th class="px-3 py-2 border">Nilai</th>
                    <th class="px-3 py-2 border">Status Kelulusan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($nilaiSiswas->whereIn('status_kelulusan', ['Lulus', 'Tidak Lulus']) as $n)
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 py-2 border text-center">{{ $n->siswa_id ?? '-' }}</td>
                        <td class="px-3 py-2 border">{{ $n->nama_siswa ?? '-' }}</td>
                        <td class="px-3 py-2 border text-center">{{ $n->nilai ?? '-' }}</td>
                        <td class="px-3 py-2 border text-center">
                            <span class="px-2 py-1 text-xs rounded-lg
                                @if($n->status_kelulusan == 'Lulus') bg-green-100 text-green-700
                                @elseif($n->status_kelulusan == 'Tidak Lulus') bg-red-100 text-red-700
                                @endif">
                                {{ $n->status_kelulusan }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-2 text-gray-500">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


</x-sidebar-kepsek>
