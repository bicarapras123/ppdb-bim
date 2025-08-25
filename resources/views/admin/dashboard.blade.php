<x-sidebar-admin>

    <!-- Header -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Data Pendaftar</h2>
        <p class="text-gray-600">
            Total Pendaftar: 
            <span class="font-semibold text-indigo-600">{{ $totalPendaftar }}</span>
        </p>
    </div>

    <!-- Card Container Pendaftar -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-700 border-collapse">
                <thead>
                    <tr class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white text-xs uppercase">
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">NISN</th>
                        <th class="px-4 py-3 text-left">Asal Sekolah</th>
                        <th class="px-4 py-3 text-left">Jurusan</th>
                        <th class="px-4 py-3 text-left">TTL</th>
                        <th class="px-4 py-3 text-left">Gender</th>
                        <th class="px-4 py-3 text-left">Agama</th>
                        <th class="px-4 py-3 text-left">Kontak</th>
                        <th class="px-4 py-3 text-left">File</th>
                        <th class="px-4 py-3 text-left">Tanggal Daftar</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-6 py-3 text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendaftaran as $p)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-2">{{ $p->nama }}</td>
                            <td class="px-4 py-2">{{ $p->nisn }}</td>
                            <td class="px-4 py-2">{{ $p->asal_sekolah }}</td>
                            <td class="px-4 py-2">{{ $p->jurusan }}</td>
                            <td class="px-4 py-2">
                                {{ $p->tempat_lahir }},
                                {{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d M Y') }}
                            </td>
                            <td class="px-4 py-2">{{ $p->jenis_kelamin }}</td>
                            <td class="px-4 py-2">{{ $p->agama }}</td>
                            <td class="px-4 py-2 text-xs">
                                <p>{{ $p->email }}</p>
                                <p class="text-gray-500">{{ $p->telepon }}</p>
                            </td>

                            <!-- Dokumen PDF -->
                            <td class="px-4 py-2 text-center">
                                @if($p->dokumen_pdf)
                                    <a href="{{ asset('storage/'.$p->dokumen_pdf) }}" target="_blank" 
                                       class="text-blue-500 hover:underline">
                                        Lihat PDF
                                    </a>
                                @else
                                    <span class="text-gray-400 text-xs">-</span>
                                @endif
                            </td>

                            <td class="px-4 py-2">{{ $p->created_at->format('d M Y') }}</td>

                            <!-- Status -->
                            <td class="px-4 py-2 text-center">
                                @if($p->status === 'pending')
                                    <span class="px-3 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">Pending</span>
                                @elseif($p->status === 'verifikasi')
                                    <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">Diverifikasi</span>
                                @elseif($p->status === 'ditolak')
                                    <span class="px-3 py-1 text-xs bg-red-100 text-red-700 rounded-full">Ditolak</span>
                                @else
                                    <span class="px-3 py-1 text-xs bg-gray-200 text-gray-600 rounded-full">Tidak Diketahui</span>
                                @endif
                            </td>

                            <!-- Aksi -->
                            <td class="px-6 py-2 text-center space-x-2">
                                @if($p->status === 'pending')
                                    <a href="{{ route('admin.pendaftaran.verifikasi', $p->id) }}" 
                                       class="px-3 py-1 text-xs bg-green-500 text-white rounded-lg hover:bg-green-600 shadow">
                                        Verifikasi
                                    </a>
                                    <a href="{{ route('admin.pendaftaran.tolak', $p->id) }}" 
                                       class="px-3 py-1 text-xs bg-red-500 text-white rounded-lg hover:bg-red-600 shadow">
                                        Tolak
                                    </a>
                                @elseif($p->status === 'ditolak')
                                    <a href="{{ route('admin.pendaftaran.verifikasi', $p->id) }}" 
                                       class="px-3 py-1 text-xs bg-green-500 text-white rounded-lg hover:bg-green-600 shadow">
                                        Refresh
                                    </a>
                                @elseif($p->status === 'verifikasi')
                                    <a href="{{ route('admin.pendaftaran.tolak', $p->id) }}" 
                                       class="px-3 py-1 text-xs bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 shadow">
                                        Batalkan
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="p-4 text-center text-gray-400">
                                Belum ada data pendaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        {{ $pendaftaran->links() }}
    </div>


    <!-- Jadwal Seleksi -->
    <div class="mt-10 bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Jadwal Seleksi</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-700 border-collapse">
                <thead>
                    <tr class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white text-xs uppercase">
                        <th class="px-4 py-3 text-left">Judul</th>
                        <th class="px-4 py-3 text-left">Isi</th>
                        <th class="px-4 py-3 text-left">Tanggal Pengumuman</th>
                        <th class="px-4 py-3 text-left">Tanggal Terakhir</th>
                        <th class="px-4 py-3 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwal as $j)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-2 font-medium">{{ $j->judul }}</td>
                            <td class="px-4 py-2">{{ Str::limit($j->isi, 50) }}</td>
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($j->tanggal_pengumuman)->format('d M Y') }}
                            </td>
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($j->tanggal_terakhir)->format('d M Y') }}
                            </td>
                            <td class="px-4 py-2">
                                @if($j->status === 'aktif')
                                    <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">Aktif</span>
                                @else
                                    <span class="px-3 py-1 text-xs bg-gray-200 text-gray-600 rounded-full">Nonaktif</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-400">
                                Belum ada jadwal seleksi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-sidebar-admin>
