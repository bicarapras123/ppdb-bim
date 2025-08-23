<x-sidebar-admin>
    <h1 class="text-2xl font-bold mb-4">Tambah Jadwal Seleksi</h1>

    <form action="{{ route('admin.jadwal.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Nama Seleksi</label>
            <input type="text" name="nama_seleksi" 
                   class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-semibold">Tanggal</label>
            <input type="date" name="tanggal" 
                   class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-semibold">Keterangan</label>
            <textarea name="keterangan" rows="3" 
                      class="w-full border rounded p-2"></textarea>
        </div>

        <button type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan
        </button>
        <a href="{{ route('admin.jadwal.index') }}" 
           class="ml-2 text-gray-600 hover:underline">Batal</a>
    </form>
</x-sidebar-admin>
