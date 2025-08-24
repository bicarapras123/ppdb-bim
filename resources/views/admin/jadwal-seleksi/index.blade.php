<x-sidebar-admin>
    <div class="flex justify-center mt-0.5">
        <div class="w-full max-w-6xl bg-white shadow-lg rounded-xl p-8 border">

            {{-- Kop Surat --}}
            <div class="text-center border-b pb-4 mb-6">
                <img src="{{ asset('logo.png') }}" alt="Logo Sekolah" class="mx-auto w-20 mb-2">
                <h2 class="text-xl font-bold">SEKOLAH MENENGAH ATAS NEGERI 1</h2>
                <p class="text-sm text-gray-700">Jl. Pendidikan No. 123, Jakarta | Telp. (021) 123456</p>
                <p class="text-sm text-gray-700">Email: info@sman1.sch.id</p>
            </div>

            {{-- Judul Halaman --}}
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                Data Daftar Ulang PPDB
            </h1>

            {{-- Tabel Daftar Ulang --}}
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 text-sm rounded-lg overflow-hidden shadow-sm">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                        <tr>
                            <th class="px-4 py-3 text-center border">No</th>
                            <th class="px-4 py-3 text-left border">Nama Siswa</th>
                            <th class="px-4 py-3 text-center border">Tanggal Daftar Ulang</th>
                            <th class="px-4 py-3 text-center border">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse($jadwal as $index => $j)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-2 text-center border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $j->nama_siswa }}</td>
                                <td class="px-4 py-2 text-center border">
                                    {{ \Carbon\Carbon::parse($j->tanggal)->format('d-m-Y') }}
                                </td>
                                <td class="px-4 py-2 border text-center">
                                    <form action="{{ route('admin.jadwal.updateStatus', $j->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="keterangan" onchange="this.form.submit()" 
                                                class="border-gray-300 rounded-lg p-2 text-sm shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                            <option value="pending" {{ $j->keterangan == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="diterima" {{ $j->keterangan == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                            <option value="ditolak" {{ $j->keterangan == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-6 text-center text-gray-500 italic">
                                    Belum ada data daftar ulang
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-sidebar-admin>
