<x-sidebar-admin>
    <div class="flex justify-center mt-10">
        <div class="w-full max-w-lg bg-white p-6 rounded-xl shadow-md border">
            
            <!-- Judul -->
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                Edit Jadwal Seleksi
            </h1>

            <!-- Form -->
            <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Nama Seleksi -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Nama Seleksi</label>
                    <input type="text" name="nama_seleksi" 
                           value="{{ $jadwal->nama_seleksi }}"
                           class="w-full border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-green-500 focus:outline-none text-sm"
                           required>
                </div>

                <!-- Tanggal -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" 
                           value="{{ $jadwal->tanggal }}"
                           class="w-full border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-green-500 focus:outline-none text-sm"
                           required>
                </div>

                <!-- Keterangan -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Keterangan</label>
                    <textarea name="keterangan" rows="3" 
                              class="w-full border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-green-500 focus:outline-none text-sm"
                              placeholder="Tambahkan keterangan...">{{ $jadwal->keterangan }}</textarea>
                </div>

                <!-- Tombol -->
                <div class="flex justify-center gap-3 pt-2">
                    <button type="submit" 
                            class="bg-green-600 text-white px-4 py-2 rounded-md shadow hover:bg-green-700 transition text-sm">
                        Update
                    </button>
                    <a href="{{ route('admin.jadwal.index') }}" 
                       class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100 transition text-sm">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-sidebar-admin>
