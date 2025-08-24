<x-sidebar class="no-print">

    {{-- 🏛 Header Resmi --}}
    <div class="text-center mb-6 print-header">
        <div class="flex items-center justify-center gap-4 mb-2">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="h-16 w-16 object-contain"> 
            <div>
                <h1 class="text-2xl font-bold text-gray-800 uppercase">
                    Pemerintah Kabupaten/Kota XYZ
                </h1>
                <h2 class="text-xl font-semibold text-gray-700 uppercase">
                    SMA Negeri 1 Contoh
                </h2>
                <p class="text-gray-500 text-sm">
                    Jl. Pendidikan No.123, Kota Contoh, Telp. (021) 123456
                </p>
            </div>
        </div>
        <hr class="border-t-2 border-gray-400 my-2">
        
        {{-- Judul Pengumuman Resmi --}}
        <h3 class="text-xl font-bold text-gray-900 uppercase tracking-wide mt-4">
            PENGUMUMAN HASIL DAFTAR ULANG<br>
            PENERIMAAN PESERTA DIDIK BARU (PPDB) TAHUN {{ date('Y') }}
        </h3>
        <p class="text-gray-600 text-sm mt-1">
            Nomor: 421/PPDB/{{ date('Y') }}
        </p>
    </div>

    {{-- 📦 Kontainer Utama --}}
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">

        {{-- Tombol Aksi --}}
        <div class="flex justify-between mb-4 no-print">
            <a href="{{ route('daftar-ulang.create') }}" 
               class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition font-medium">
                Tambah
            </a>
            <button onclick="window.print()" 
               class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                Cetak
            </button>
        </div>

        {{-- 📋 Tabel Daftar Ulang --}}
        <div class="overflow-x-auto print-area mb-8">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-100 to-gray-50 border-b border-gray-200">
                        <th class="px-6 py-3 font-semibold text-gray-700 uppercase tracking-wider">NISN</th>
                        <th class="px-6 py-3 font-semibold text-gray-700 uppercase tracking-wider">Nama Siswa</th>
                        <th class="px-6 py-3 font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 font-semibold text-gray-700 uppercase tracking-wider">Bukti Pembayaran</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
    @forelse($daftar_ulang as $item)
        <tr class="hover:bg-gray-50 transition">
            <td class="px-6 py-3 text-gray-800 font-medium">{{ $item->siswa_id }}</td>
            <td class="px-6 py-3 text-gray-800">{{ $item->nama_siswa }}</td>
            <td class="px-6 py-3">
                @php
                    $statusClass = match($item->status) {
                        'diterima' => 'bg-green-100 text-green-700',
                        'pending'  => 'bg-yellow-100 text-yellow-700',
                        'ditolak'  => 'bg-red-100 text-red-700',
                        default    => 'bg-gray-100 text-gray-600',
                    };
                @endphp
                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $statusClass }}">
                    {{ ucfirst($item->status) }}
                </span>
            </td>
            <td class="px-6 py-3 text-gray-600 italic">
                {{ $item->bukti_pembayaran ? '✅ Sudah Upload' : '❌ Belum Ada' }}
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center py-6 text-gray-500">
                Belum ada data daftar ulang.
            </td>
        </tr>
    @endforelse
</tbody>

            </table>
        </div>

</x-sidebar>

{{-- 🎨 CSS Print --}}
<style>
    @media print {
        .no-print { display: none !important; }
        .print-header { display: block !important; margin-bottom: 20px; }
        .print-area { display: block !important; }
        body {
            background: white !important;
            margin: 0;
            font-size: 12pt;
        }
        table {
            font-size: 11pt;
            border: 1px solid #000;
            border-collapse: collapse;
            width: 100%;
        }
        table th, table td {
            border: 1px solid #000;
            padding: 6px 8px;
        }
    }
</style>
