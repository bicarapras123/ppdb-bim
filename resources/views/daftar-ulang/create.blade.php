<x-sidebar>
    <div class="flex items-start justify-center min-h-[80vh] bg-gray-50 pt-10">
        <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                Form Daftar Ulang
            </h1>

            {{-- Error Alert --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-sm">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('daftar-ulang.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                {{-- NISN --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-1">NISN</label>
                    <input type="text" name="siswa_id" value="{{ old('siswa_id') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none" required>
                </div>

                {{-- Nama Siswa --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nama Siswa</label>
                    <input type="text" name="nama_siswa" value="{{ old('nama_siswa') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none" required>
                </div>

                {{-- Bukti Pembayaran --}}
                <div>
                    <label for="bukti_pembayaran" class="block text-gray-700 font-medium mb-1">Upload Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-500 focus:outline-none" required>
                </div>

                {{-- Upload Nilai --}}
                <div>
                    <label for="nilai" class="block text-gray-700 font-medium mb-1">Upload Nilai</label>
                    <input type="file" name="nilai" id="nilai"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-500 focus:outline-none" required>
                </div>

                {{-- Submit Button --}}
                <button type="submit"
                    class="w-full bg-green-600 text-white py-2.5 rounded-lg font-semibold shadow hover:bg-green-700 transition">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</x-sidebar>
