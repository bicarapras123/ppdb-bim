<x-sidebar-admin>
    <div class="flex justify-center mt-10">
        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8 border">

            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
                Tambah Nilai Siswa
            </h2>

            <form action="{{ route('admin.nilai.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-semibold text-gray-700">NISN Siswa</label>
                    <input type="number" name="siswa_id"
                           class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-200" required>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700">Nama Siswa</label>
                    <input type="text" name="nama_siswa"
                           class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-200" required>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700">Mata Pelajaran</label>
                    <input type="text" name="mapel"
                           class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-200" required>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700">Nilai</label>
                    <input type="number" name="nilai" min="0" max="100"
                           class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-200" required>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700">Status Kelulusan</label>
                    <select name="status_kelulusan"
                            class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-200" required>
                        <option value="Lulus">Lulus</option>
                        <option value="Tidak Lulus">Tidak Lulus</option>
                    </select>
                </div>

                <div class="flex justify-between mt-6">
                    <a href="{{ route('admin.nilai.index') }}"
                       class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition">
                        Kembali
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-sidebar-admin>
