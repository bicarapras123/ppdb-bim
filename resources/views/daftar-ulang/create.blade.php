<x-sidebar>
    <div class="flex items-center justify-center py-12">
        <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 w-full max-w-md">
            
            {{-- Judul --}}
            <h2 class="text-xl font-bold text-gray-800 mb-6 text-center">
                Tambah Daftar Ulang
            </h2>

            {{-- Form --}}
            <form action="{{ route('daftar-ulang.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                {{-- Siswa ID --}}
                <div>
                    <label for="siswa_id" class="block text-sm font-medium text-gray-700 mb-1">
                        Siswa ID
                    </label>
                    <input type="number" name="siswa_id" id="siswa_id" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500 transition"
                           placeholder="Masukkan ID siswa" required>
                </div>

                {{-- Upload Bukti Pembayaran --}}
                <div>
                    <label for="bukti_pembayaran" class="block text-sm font-medium text-gray-700 mb-1">
                        Upload Bukti Pembayaran
                    </label>
                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500 transition"
                           required>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-between items-center">
                    <a href="{{ route('daftar-ulang.index') }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-sidebar>
