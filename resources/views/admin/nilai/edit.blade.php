{{-- resources/views/admin/nilai/edit.blade.php --}}
<x-sidebar-admin>
    <div class="flex justify-center mt-6">
        <div class="bg-white shadow rounded-lg p-6 w-full max-w-md">
            <h1 class="text-xl font-bold text-gray-800 mb-4 text-center">
                Edit Nilai Siswa
            </h1>

            <form action="{{ route('admin.nilai.update', $nilai->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block font-semibold text-sm">Siswa ID</label>
                    <input type="number" name="siswa_id" value="{{ $nilai->siswa_id }}" 
                           class="w-full border rounded px-3 py-2 text-sm" required>
                </div>

                <div>
                    <label class="block font-semibold text-sm">Nama Siswa</label>
                    <input type="text" name="nama_siswa" value="{{ $nilai->nama_siswa }}" 
                           class="w-full border rounded px-3 py-2 text-sm" required>
                </div>

                <div>
                    <label class="block font-semibold text-sm">Mata Pelajaran</label>
                    <input type="text" name="mapel" value="{{ $nilai->mapel }}" 
                           class="w-full border rounded px-3 py-2 text-sm" required>
                </div>

                <div>
                    <label class="block font-semibold text-sm">Nilai</label>
                    <input type="number" name="nilai" value="{{ $nilai->nilai }}" 
                           class="w-full border rounded px-3 py-2 text-sm" required min="0" max="100">
                </div>

                <div>
                    <label class="block font-semibold text-sm">Status Kelulusan</label>
                    <select name="status_kelulusan" class="w-full border rounded px-3 py-2 text-sm" required>
                        <option value="Lulus" {{ $nilai->status_kelulusan == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                        <option value="Tidak Lulus" {{ $nilai->status_kelulusan == 'Tidak Lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                    </select>
                </div>

                <div class="flex justify-center gap-2 pt-2">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded text-sm hover:bg-blue-700 transition">
                        Update
                    </button>
                    <a href="{{ route('admin.nilai.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded text-sm hover:bg-gray-600 transition">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-sidebar-admin>
