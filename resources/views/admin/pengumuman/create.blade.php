<x-sidebar-admin>
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Pengumuman Seleksi</h2>

        <form action="{{ route('admin.pengumuman.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Judul --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Judul</label>
                <input type="text" 
                       name="judul" 
                       value="{{ old('judul') }}" 
                       class="border w-full p-2 rounded" required>
            </div>

            {{-- Isi --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Isi</label>
                <textarea name="isi" 
                          rows="5" 
                          class="border w-full p-2 rounded" required>{{ old('isi') }}</textarea>
            </div>

            {{-- Status --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Status</label>
                <select name="status" class="border w-full p-2 rounded" required>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                </select>
            </div>

            {{-- Tanggal Pengumuman --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Tanggal Pengumuman</label>
                <input type="date" 
                       name="tanggal_pengumuman" 
                       value="{{ old('tanggal_pengumuman') }}" 
                       class="border w-full p-2 rounded" required>
            </div>

            {{-- Tanggal Terakhir --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Tanggal Terakhir</label>
                <input type="date" 
                       name="tanggal_terakhir" 
                       value="{{ old('tanggal_terakhir') }}" 
                       class="border w-full p-2 rounded" required>
            </div>

            {{-- Tombol --}}
            <div class="flex items-center space-x-2">
                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
                <a href="{{ route('admin.pengumuman.index') }}" 
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</x-sidebar-admin>
