<x-sidebar-admin>
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit Pengumuman Seleksi</h2>

        <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}" method="POST">
            @csrf 
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Judul</label>
                <input type="text" 
                       name="judul" 
                       value="{{ old('judul', $pengumuman->judul) }}" 
                       class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Isi</label>
                <textarea name="isi" class="border w-full p-2 rounded">{{ old('isi', $pengumuman->isi) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Status</label>
                <select name="status" class="border w-full p-2 rounded">
                    <option value="draft" {{ $pengumuman->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="publish" {{ $pengumuman->status == 'publish' ? 'selected' : '' }}>Publish</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Tanggal Pengumuman</label>
                <input type="date" 
                       name="tanggal_pengumuman" 
                       value="{{ old('tanggal_pengumuman', $pengumuman->tanggal_pengumuman) }}" 
                       class="border w-full p-2 rounded">
            </div>

            <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update
            </button>
        </form>
    </div>
</x-sidebar-admin>
