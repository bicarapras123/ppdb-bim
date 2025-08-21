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
            <p class="text-3xl font-bold text-green-700 mt-2">1,250</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm uppercase font-semibold">Sudah Diverifikasi</h3>
            <p class="text-3xl font-bold text-blue-600 mt-2">980</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm uppercase font-semibold">Menunggu Hasil</h3>
            <p class="text-3xl font-bold text-yellow-600 mt-2">270</p>
        </div>
    </div>

    <!-- Jadwal Seleksi -->
    <div class="bg-white p-6 rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800">📅 Jadwal Seleksi</h3>
            <a href="#" class="text-sm text-green-700 hover:underline">Lihat Semua</a>
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
                    <tr>
                        <td class="px-4 py-2 font-medium">Pendaftaran Online</td>
                        <td class="px-4 py-2">1 - 15 Juni 2025</td>
                        <td class="px-4 py-2">
                            <span class="bg-green-100 text-green-700 px-2 py-1 text-xs rounded-full">Selesai</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 font-medium">Verifikasi Berkas</td>
                        <td class="px-4 py-2">16 - 20 Juni 2025</td>
                        <td class="px-4 py-2">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 text-xs rounded-full">Berlangsung</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 font-medium">Tes Seleksi</td>
                        <td class="px-4 py-2">25 Juni 2025</td>
                        <td class="px-4 py-2">
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 text-xs rounded-full">Mendatang</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 font-medium">Pengumuman Hasil</td>
                        <td class="px-4 py-2">30 Juni 2025</td>
                        <td class="px-4 py-2">
                            <span class="bg-gray-100 text-gray-600 px-2 py-1 text-xs rounded-full">Belum Dimulai</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-sidebar>
