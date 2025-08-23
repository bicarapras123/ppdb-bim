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
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                Daftar Nilai Siswa
            </h1>

            {{-- Tombol Tambah --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.nilai.create') }}" 
                   class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                    + Tambah Nilai
                </a>
            </div>

            {{-- Tabel --}}
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 text-sm rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-3 py-2">Siswa ID</th>
                            <th class="border px-3 py-2">Nama Siswa</th>
                            <th class="border px-3 py-2">Mata Pelajaran</th>
                            <th class="border px-3 py-2">Nilai</th>
                            <th class="border px-3 py-2">Status</th>
                            <th class="border px-3 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nilai as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border px-3 py-2">{{ $item->siswa_id }}</td>
                                <td class="border px-3 py-2">{{ $item->nama_siswa }}</td>
                                <td class="border px-3 py-2">{{ $item->mapel }}</td>
                                <td class="border px-3 py-2">{{ $item->nilai }}</td>
                                
                                {{-- Status Kelulusan --}}
                                <td class="border px-3 py-2 
                                    {{ $item->status_kelulusan == 'Lulus' ? 'text-green-600 font-semibold' : 'text-red-600 font-semibold' }}">
                                    {{ $item->status_kelulusan }}
                                </td>

                                <td class="border px-3 py-2 flex gap-2">
                                    <a href="{{ route('admin.nilai.edit', $item->id) }}" 
                                       class="px-3 py-1 bg-blue-500 text-white rounded shadow hover:bg-blue-600 transition">Edit</a>
                                    <form action="{{ route('admin.nilai.destroy', $item->id) }}" 
                                          method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1 bg-red-500 text-white rounded shadow hover:bg-red-600 transition">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-3 text-gray-500">
                                    Belum ada data nilai siswa.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-sidebar-admin>
