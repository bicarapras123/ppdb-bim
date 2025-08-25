<x-sidebar>
    <!-- Header -->
    <h2 class="text-2xl font-bold text-gray-800 mb-1">
        Selamat Datang, {{ session('user_nama') ?? 'User' }}
    </h2>

    <p class="text-gray-600 mb-6">
        Dashboard Sistem PPDB - Informasi terbaru dan jadwal seleksi.
    </p>

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

   <!-- Jadwal Seleksi -->
<div class="bg-white p-6 rounded-xl shadow-md mb-8">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-800">📅 Jadwal Seleksi</h3>

        <!-- Tombol Cetak -->
        <button onclick="window.print()" 
            class="no-print bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
            Cetak
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">Tahap</th>
                    <th class="px-4 py-2 text-left">Tanggal</th>
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
        <!-- Step 1 -->
        <div class="ml-6">
            <div class="absolute w-4 h-4 bg-indigo-500 rounded-full -left-[9px] border-2 border-white shadow"></div>
            <h4 class="text-base font-semibold text-gray-900">Pendaftaran</h4>
            <p class="text-sm text-gray-600">
                Calon siswa mengisi formulir pendaftaran secara online dan melengkapi dokumen persyaratan.
            </p>
        </div>

        <!-- Step 2 -->
        <div class="ml-6">
            <div class="absolute w-4 h-4 bg-indigo-500 rounded-full -left-[9px] border-2 border-white shadow"></div>
            <h4 class="text-base font-semibold text-gray-900">Verifikasi Data</h4>
            <p class="text-sm text-gray-600">
                Panitia melakukan pemeriksaan kelengkapan dokumen dan keabsahan data yang telah diunggah.
            </p>
        </div>

        <!-- Step 3 -->
        <div class="ml-6">
            <div class="absolute w-4 h-4 bg-indigo-500 rounded-full -left-[9px] border-2 border-white shadow"></div>
            <h4 class="text-base font-semibold text-gray-900">Seleksi & Penilaian</h4>
            <p class="text-sm text-gray-600">
                Data calon siswa dinilai berdasarkan kriteria seleksi yang telah ditentukan.
            </p>
        </div>

        <!-- Step 4 -->
        <div class="ml-6">
            <div class="absolute w-4 h-4 bg-indigo-500 rounded-full -left-[9px] border-2 border-white shadow"></div>
            <h4 class="text-base font-semibold text-gray-900">Pengumuman Hasil</h4>
            <p class="text-sm text-gray-600">
                Hasil seleksi diumumkan melalui sistem sesuai jadwal yang telah ditetapkan.
            </p>
        </div>

        <!-- Step 5 -->
        <div class="ml-6">
            <div class="absolute w-4 h-4 bg-indigo-500 rounded-full -left-[9px] border-2 border-white shadow"></div>
            <h4 class="text-base font-semibold text-gray-900">Daftar Ulang</h4>
            <p class="text-sm text-gray-600">
                Siswa yang diterima wajib melakukan daftar ulang untuk memastikan status keikutsertaan.
            </p>
        </div>

        <!-- Step 6 -->
        <div class="ml-6">
            <div class="absolute w-4 h-4 bg-indigo-500 rounded-full -left-[9px] border-2 border-white shadow"></div>
            <h4 class="text-base font-semibold text-gray-900">Upload Bukti Pembayaran</h4>
            <p class="text-sm text-gray-600">
                Calon siswa mengunggah bukti pembayaran daftar ulang sebagai syarat finalisasi penerimaan.
            </p>
        </div>
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
