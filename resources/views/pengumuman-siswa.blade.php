<x-sidebar>

    {{-- ========================= --}}
    {{-- 🏛 HEADER RESMI (KOP SURAT) --}}
    {{-- ========================= --}}
    <div class="text-center mb-8 print-header">
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
        
        {{-- Judul Pengumuman --}}
        <h3 class="text-xl font-bold text-gray-900 uppercase tracking-wide mt-4">
            PENGUMUMAN HASIL SELEKSI<br>
            PENERIMAAN PESERTA DIDIK BARU (PPDB) TAHUN {{ date('Y') }}
        </h3>
        <p class="text-gray-600 text-sm mt-1">
            Nomor: 421/PPDB/{{ date('Y') }}
        </p>
    </div>


    {{-- ========================= --}}
    {{-- 📋 HASIL SELEKSI (TABEL) --}}
    {{-- ========================= --}}
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 mb-8">

        {{-- 🔎 Pencarian + Cetak --}}
        <div class="flex justify-between items-center mb-4 no-print">
            <form method="GET" action="{{ url()->current() }}" class="flex gap-2">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Cari NISN / Nama Siswa..." 
                    class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400"
                >
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Cari
                </button>
            </form>

            <button onclick="window.print()" 
               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Cetak
            </button>
        </div>

        {{-- Tabel Data --}}
        <div class="overflow-x-auto print-area">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-100 to-gray-50 border-b border-gray-200">
                        <th class="px-6 py-3 font-semibold text-gray-700 uppercase tracking-wider">NISN</th>
                        <th class="px-6 py-3 font-semibold text-gray-700 uppercase tracking-wider">Nama Siswa</th>
                        <th class="px-6 py-3 font-semibold text-gray-700 uppercase tracking-wider">Total Nilai</th>
                        <th class="px-6 py-3 font-semibold text-gray-700 uppercase tracking-wider">Status Kelulusan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($nilaiSiswas as $nilai)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3 text-gray-800">{{ $nilai->siswa_id }}</td>
                            <td class="px-6 py-3 text-gray-800 font-medium">{{ $nilai->nama_siswa }}</td>
                            <td class="px-6 py-3 font-bold text-indigo-600">{{ $nilai->nilai }}</td>
                            <td class="px-6 py-3">
                                @if($nilai->status_kelulusan == 'Lulus')
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                        ✅ Lulus
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                        ❌ Tidak Lulus
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-6 text-gray-500">
                                Belum ada nilai untuk ditampilkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    {{-- =============================== --}}
    {{-- 📌 INFORMASI & TAHAPAN PROSES --}}
    {{-- =============================== --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        {{-- Informasi Penting --}}
        <div class="bg-gradient-to-br from-white to-gray-50 p-6 rounded-xl shadow-md border border-gray-200">
            <h3 class="text-lg font-bold text-gray-900 mb-3 border-b pb-2">
                ℹ️ Informasi Penting
            </h3>
            <ul class="list-disc list-inside text-sm text-gray-700 space-y-2">
                <li>Siswa yang <span class="font-semibold text-green-600">Lulus</span> wajib melakukan <span class="font-semibold">daftar ulang</span>.</li>
                <li>Bukti pembayaran daftar ulang harus diunggah melalui sistem sebelum batas waktu.</li>
                <li>Siswa yang <span class="font-semibold text-red-600">Tidak Lulus</span> tetap semangat & bisa mencoba jalur lain.</li>
                <li>Informasi resmi diumumkan di website sekolah atau papan pengumuman.</li>
            </ul>
        </div>

        {{-- Tahapan Proses --}}
        <div class="bg-gradient-to-br from-white to-gray-50 p-6 rounded-xl shadow-md border border-gray-200">
            <h3 class="text-lg font-bold text-gray-900 mb-3 border-b pb-2">
                📖 Tahapan Proses PPDB
            </h3>
            <ol class="list-decimal list-inside space-y-2 text-gray-700 text-sm leading-relaxed">
                <li><span class="font-semibold">Pendaftaran:</span> Calon siswa mengisi formulir & melengkapi berkas.</li>
                <li><span class="font-semibold">Verifikasi Data:</span> Panitia memeriksa kelengkapan berkas.</li>
                <li><span class="font-semibold">Seleksi & Penilaian:</span> Data siswa diproses sesuai kriteria.</li>
                <li><span class="font-semibold">Pengumuman Hasil:</span> Hasil seleksi diumumkan sesuai jadwal.</li>
                <li><span class="font-semibold">Daftar Ulang:</span> Siswa yang diterima wajib daftar ulang.</li>
                <li><span class="font-semibold">Upload Bukti:</span> Unggah bukti pembayaran daftar ulang di sistem.</li>
            </ol>
        </div>
    </div>

</x-sidebar>


{{-- 🎨 CSS Print --}}
<style>
    @media print {
        x-sidebar,
        .no-print {
            display: none !important;
        }

        .print-header {
            display: block !important;
            margin-bottom: 20px;
        }

        .print-area {
            display: block !important;
        }

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
