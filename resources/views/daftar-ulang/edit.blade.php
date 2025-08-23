<x-sidebar>
    <div class="flex justify-center items-start">
        <div class="w-full max-w-lg">
            <!-- Header -->
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-800">Edit Daftar Ulang</h2>
                <p class="text-gray-500 text-sm mt-1">Perbarui data siswa dan bukti pembayaran</p>
            </div>

            <!-- Form -->
            <form action="{{ route('daftar-ulang.update', $daftarUlang->id) }}" 
                  method="POST" 
                  enctype="multipart/form-data" 
                  class="bg-white shadow-xl rounded-2xl p-6 space-y-5 border border-gray-100">
                @csrf 
                @method('PUT')

                <!-- Siswa ID -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Siswa ID</label>
                    <input type="number" 
                           name="siswa_id" 
                           value="{{ $daftarUlang->siswa_id }}" 
                           class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 text-gray-700 shadow-sm" 
                           required>
                </div>

                <!-- Bukti Pembayaran -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Bukti Pembayaran</label>
                    <input type="file" 
                           name="bukti_pembayaran" 
                           class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 text-gray-700 shadow-sm">
                </div>

                <!-- Status (readonly dari database, hanya tampil) -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                    <div class="px-3 py-2 rounded-lg bg-gray-100 border text-gray-700 text-sm shadow-sm">
                        {{ ucfirst($daftarUlang->status) }}
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Status ini hanya dapat diubah dari database admin.</p>
                </div>

                <!-- Submit -->
                <div class="pt-4">
                    <button type="submit" 
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded-lg shadow-md transition">
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-sidebar>
