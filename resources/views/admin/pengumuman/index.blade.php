<x-sidebar-admin>
    <div class="flex justify-center mt-0.5">
        <div class="w-full max-w-5xl bg-white shadow-lg rounded-xl p-8 border">

            {{-- Kop Surat --}}
            <div class="text-center border-b pb-4 mb-6">
                <img src="{{ asset('logo.png') }}" alt="Logo Sekolah" class="mx-auto w-20 mb-2">
                <h2 class="text-xl font-bold">SEKOLAH MENENGAH ATAS NEGERI 1</h2>
                <p class="text-sm text-gray-700">Jl. Pendidikan No. 123, Jakarta | Telp. (021) 123456</p>
                <p class="text-sm text-gray-700">Email: info@sman1.sch.id</p>
            </div>

            {{-- Judul Halaman --}}
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                Daftar Pengumuman Seleksi
            </h1>

            {{-- Tombol Tambah --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.pengumuman.create') }}" 
                   class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                    + Tambah Pengumuman
                </a>
            </div>

            {{-- Tabel Pengumuman --}}
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 text-sm rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-3 py-2">Judul</th>
                            <th class="border px-3 py-2">Tanggal Pengumuman</th>
                            <th class="border px-3 py-2">Tanggal Terakhir</th>
                            <th class="border px-3 py-2">Status</th>
                            <th class="border px-3 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengumuman as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border px-3 py-2">{{ $item->judul }}</td>
                                <td class="border px-3 py-2 text-center">
                                    {{ \Carbon\Carbon::parse($item->tanggal_pengumuman)->format('d M Y') }}
                                </td>
                                <td class="border px-3 py-2 text-center">
                                    @if($item->tanggal_terakhir)
                                        {{ \Carbon\Carbon::parse($item->tanggal_terakhir)->format('d M Y') }}
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="border px-3 py-2 text-center">
                                    <span class="px-2 py-1 rounded text-white text-xs font-semibold
                                        {{ $item->status == 'publish' ? 'bg-green-600' : 'bg-gray-500' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="border px-3 py-2 flex gap-2 justify-center">
                                    <a href="{{ route('admin.pengumuman.edit', $item->id) }}" 
                                       class="px-3 py-1 bg-blue-500 text-white rounded shadow hover:bg-blue-600 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.pengumuman.destroy', $item->id) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Yakin hapus pengumuman ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1 bg-red-500 text-white rounded shadow hover:bg-red-600 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-3 text-gray-500">
                                    Belum ada pengumuman.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-sidebar-admin>
