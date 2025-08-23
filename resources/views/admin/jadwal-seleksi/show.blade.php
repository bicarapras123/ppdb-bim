<x-sidebar-admin>
    <div class="flex justify-center mt-10">
        <div class="w-full max-w-lg bg-white p-6 rounded-xl shadow-md border">
            
            <!-- Judul -->
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                Detail Jadwal Seleksi
            </h1>

            <!-- Konten -->
            <div class="space-y-3 text-sm">
                <p><span class="font-semibold text-gray-700">Nama Seleksi:</span> {{ $jadwal->nama_seleksi }}</p>
                <p><span class="font-semibold text-gray-700">Tanggal:</span> {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y') }}</p>
                <p><span class="font-semibold text-gray-700">Keterangan:</span> {{ $jadwal->keterangan }}</p>
            </div>

            <!-- Tombol -->
            <div class="flex justify-center gap-3 mt-6">
                <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}" 
                   class="bg-green-600 text-white px-4 py-2 rounded-md shadow hover:bg-green-700 transition text-sm">
                    Edit
                </a>
                <a href="{{ route('admin.jadwal.index') }}" 
                   class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100 transition text-sm">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-sidebar-admin>
