<x-sidebar-admin>
    <div class="flex justify-center mt-0.5">
        <div class="w-full max-w-5xl bg-white shadow-lg rounded-xl p-8 border">

            {{-- Kop Surat --}}
            <div class="text-center border-b pb-4 mb-6">
                {{-- Logo Sekolah --}}
                <img src="{{ asset('logo.png') }}" alt="Logo Sekolah" class="mx-auto w-20 mb-2">

                {{-- Teks Kop --}}
                <h2 class="text-xl font-bold">SEKOLAH MENENGAH ATAS NEGERI 1</h2>
                <p class="text-sm text-gray-700">Jl. Pendidikan No. 123, Jakarta | Telp. (021) 123456</p>
                <p class="text-sm text-gray-700">Email: info@sman1.sch.id</p>
            </div>

            {{-- Judul Halaman --}}
            <h1 class="text-2xl font-bold text-center text-black-700 mb-6">
                Jadwal Seleksi PPDB
            </h1>

            {{-- Tombol Tambah Jadwal --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.jadwal.create') }}" 
                   class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                    + Tambah Jadwal
                </a>
            </div>

            {{-- Tabel Jadwal Seleksi --}}
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 text-sm rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left font-semibold border">Nama Seleksi</th>
                            <th class="px-4 py-2 text-center font-semibold border">Tanggal</th>
                            <th class="px-4 py-2 text-left font-semibold border">Keterangan</th>
                            <th class="px-4 py-2 text-center font-semibold border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jadwal as $j)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-2 border">{{ $j->nama_seleksi }}</td>
                                <td class="px-4 py-2 text-center border">
                                    {{ \Carbon\Carbon::parse($j->tanggal)->format('d-m-Y') }}
                                </td>
                                <td class="px-4 py-2 border">{{ $j->keterangan }}</td>
                                <td class="px-4 py-2 text-center border space-x-2">
                                    <a href="{{ route('admin.jadwal.show', $j->id) }}" 
                                       class="px-3 py-1 rounded bg-blue-500 text-white text-xs shadow hover:bg-blue-600 transition">
                                        Detail
                                    </a>
                                    <a href="{{ route('admin.jadwal.edit', $j->id) }}" 
                                       class="px-3 py-1 rounded bg-green-500 text-white text-xs shadow hover:bg-green-600 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.jadwal.destroy', $j->id) }}" 
                                          method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Yakin hapus jadwal ini?')"
                                                class="px-3 py-1 rounded bg-red-500 text-white text-xs shadow hover:bg-red-600 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                    Belum ada jadwal seleksi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-sidebar-admin>
