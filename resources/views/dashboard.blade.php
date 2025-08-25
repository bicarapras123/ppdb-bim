<x-sidebar>
    <!-- Header -->
    <h2 class="text-2xl font-bold text-gray-800 mb-1">
        Selamat Datang, {{ session('user_nama') ?? 'User' }}
    </h2>

    <p class="text-gray-600 mb-6">
        Dashboard Sistem PPDB - Informasi terbaru dan jadwal seleksi.
    </p>

    <!-- Tombol Cetak -->
    <div class="flex justify-end mb-4">
        <button onclick="window.print()" 
            class="no-print bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
            Cetak
        </button>
    </div>

    <!-- Statistik Ringkas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm uppercase font-semibold">Total Pendaftar</h3>
            <p class="text-3xl font-bold text-green-700 mt-2">{{ $totalPendaftar }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm uppercase font-semibold">Sudah Diverifikasi</h3>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $sudahDiverifikasi }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm uppercase font-semibold">Menunggu Hasil</h3>
            <p class="text-3xl font-bold text-yellow-600 mt-2">{{ $menungguHasil }}</p>
        </div>
    </div>

    <!-- Data Siswa -->
    <div class="bg-white p-6 rounded-xl shadow-md mb-8">
        <h3 class="text-lg font-bold text-gray-800 mb-4">👤 Data Pendaftaran Siswa</h3>

        @if($pendaftaran)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="font-semibold text-gray-700">Nama</p>
                    <p class="text-gray-800">{{ $pendaftaran->nama }}</p>
                </div>
                <div>
                    <p class="font-semibold text-gray-700">NISN</p>
                    <p class="text-gray-800">{{ $pendaftaran->nisn }}</p>
                </div>
                <div>
                    <p class="font-semibold text-gray-700">Asal Sekolah</p>
                    <p class="text-gray-800">{{ $pendaftaran->asal_sekolah }}</p>
                </div>
                <div>
                    <p class="font-semibold text-gray-700">Jurusan</p>
                    <p class="text-gray-800">{{ $pendaftaran->jurusan }}</p>
                </div>
                <div>
                    <p class="font-semibold text-gray-700">Email</p>
                    <p class="text-gray-800">{{ $pendaftaran->email }}</p>
                </div>
                <div>
                    <p class="font-semibold text-gray-700">Telepon</p>
                    <p class="text-gray-800">{{ $pendaftaran->telepon }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="font-semibold text-gray-700">Alamat</p>
                    <p class="text-gray-800">{{ $pendaftaran->alamat }}</p>
                </div>
                <div>
                    <p class="font-semibold text-gray-700">Status</p>
                    <span class="px-3 py-1 rounded-full text-xs 
                        {{ $pendaftaran->status === 'verifikasi' ? 'bg-green-100 text-green-700' : 
                           ($pendaftaran->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-600') }}">
                        {{ ucfirst($pendaftaran->status) }}
                    </span>
                </div>
            </div>
        @else
            <p class="text-red-500">Data pendaftaran belum ditemukan.</p>
        @endif
    </div>

    <!-- Jadwal Seleksi -->
    <div class="bg-white p-6 rounded-xl shadow-md mb-8">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800">📅 Jadwal Seleksi</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Tahap</th>
                        <th class="px-4 py-2 text-left">Tanggal Pengumpulan</th>
                        <th class="px-4 py-2 text-left">Tanggal Terakhir Pengumpulan</th>
                        <th class="px-4 py-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($jadwal as $item)
                        <tr>
                            <td class="px-4 py-2 font-medium">
                                {{ $item->judul }}
                                <div class="text-xs text-gray-500 mt-1">
                                    <span class="font-semibold">Perihal:</span> {{ $item->isi }}
                                </div>
                            </td>
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($item->tanggal_pengumuman)->format('d M Y') }}
                            </td>
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($item->tanggal_terakhir)->format('d M Y') }}
                            </td>
                            <td class="px-4 py-2">
                                @php
                                    $statusColor = match($item->status) {
                                        'publish' => 'bg-green-100 text-green-700',
                                        'draft'   => 'bg-gray-100 text-gray-600',
                                        default   => 'bg-yellow-100 text-yellow-700',
                                    };
                                @endphp
                                <span class="{{ $statusColor }} px-2 py-1 text-xs rounded-full">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-gray-500">
                                Belum ada jadwal seleksi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Penjelasan Tahapan Seleksi -->
    <div class="bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl shadow-lg border border-gray-200">
        <h3 class="text-xl font-bold text-gray-900 mb-6 border-b pb-3">
            Tahapan Proses PPDB
        </h3>

        <div class="relative border-l-2 border-indigo-400 ml-3 space-y-8">
            @foreach([
                ['Pendaftaran', 'Calon siswa mengisi formulir pendaftaran secara online dan melengkapi dokumen persyaratan.'],
                ['Verifikasi Data', 'Panitia melakukan pemeriksaan kelengkapan dokumen dan keabsahan data yang telah diunggah.'],
                ['Seleksi & Penilaian', 'Data calon siswa dinilai berdasarkan kriteria seleksi yang telah ditentukan.'],
                ['Pengumuman Hasil', 'Hasil seleksi diumumkan melalui sistem sesuai jadwal yang telah ditetapkan.'],
                ['Daftar Ulang', 'Siswa yang diterima wajib melakukan daftar ulang untuk memastikan status keikutsertaan.'],
                ['Upload Bukti Pembayaran', 'Calon siswa mengunggah bukti pembayaran daftar ulang sebagai syarat finalisasi penerimaan.']
            ] as [$step, $desc])
                <div class="ml-6">
                    <div class="absolute w-4 h-4 bg-indigo-500 rounded-full -left-[9px] border-2 border-white shadow"></div>
                    <h4 class="text-base font-semibold text-gray-900">{{ $step }}</h4>
                    <p class="text-sm text-gray-600">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-sidebar>

<!-- CSS khusus agar tombol tidak ikut tercetak -->
<style>
    @media print {
        .no-print {
            display: none !important;
        }
    }
</style>
