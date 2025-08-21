<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Siswa Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="bg-white shadow-md rounded-lg w-full max-w-lg grid grid-cols-1 md:grid-cols-2 overflow-hidden">
        <!-- Bagian Kiri -->
        <div class="bg-green-700 text-white p-4 flex flex-col justify-center">
            <h2 class="text-lg font-bold mb-1">Selamat Datang!</h2>
            <p class="text-xs leading-snug">
                Silakan isi data Anda untuk memulai proses registrasi siswa baru.
            </p>
        </div>

        <!-- Bagian Kanan -->
        <div class="p-4">
            <h1 class="text-lg font-bold mb-3 text-green-700">Registrasi Siswa Baru</h1>
            
            {{-- ✅ Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-2 rounded mb-2 text-xs">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('registrasi.store') }}" method="POST" enctype="multipart/form-data" 
                  class="grid grid-cols-1 md:grid-cols-2 gap-2 text-xs text-green-700">
                @csrf

                <input type="text" name="nama" placeholder="Nama Lengkap" 
                       value="{{ old('nama') }}" 
                       class="border p-2 rounded w-full placeholder:text-green-500">

                <input type="text" name="nisn" placeholder="NISN" 
                       value="{{ old('nisn') }}" 
                       class="border p-2 rounded w-full placeholder:text-green-500">

                <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" 
                       value="{{ old('tempat_lahir') }}" 
                       class="border p-2 rounded w-full placeholder:text-green-500">

                <input type="text" name="asal_sekolah" placeholder="Asal Sekolah" 
                       value="{{ old('asal_sekolah') }}" 
                       class="border p-2 rounded w-full placeholder:text-green-500">
                
                <input type="date" name="tanggal_lahir" 
                       value="{{ old('tanggal_lahir') }}" 
                       class="border p-2 rounded w-full">

                <select name="jurusan" class="border p-2 rounded w-full">
                    <option value="">Pilih Jurusan</option>
                    <option value="DKV" {{ old('jurusan') == 'DKV' ? 'selected' : '' }}>DKV</option>
                    <option value="BDP" {{ old('jurusan') == 'BDP' ? 'selected' : '' }}>BDP</option>
                    <option value="TJKT" {{ old('jurusan') == 'TJKT' ? 'selected' : '' }}>TJKT</option>
                    <option value="BCP" {{ old('jurusan') == 'BCP' ? 'selected' : '' }}>BCP</option>
                </select>

                <div class="flex items-center space-x-4 text-xs">
                    <label class="flex items-center space-x-1">
                        <input type="radio" name="jenis_kelamin" value="Laki-Laki" 
                            {{ old('jenis_kelamin') == 'Laki-Laki' ? 'checked' : '' }} 
                            class="h-3 w-3 text-green-600 focus:ring-green-600">
                        <span>Laki-laki</span>
                    </label>
                    <label class="flex items-center space-x-1">
                        <input type="radio" name="jenis_kelamin" value="Perempuan" 
                            {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }} 
                            class="h-3 w-3 text-green-600 focus:ring-green-600">
                        <span>Perempuan</span>
                    </label>
                </div>

                <select name="agama" class="border p-2 rounded w-full col-span-2">
                    <option value="">Pilih Agama</option>
                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Budha" {{ old('agama') == 'Budha' ? 'selected' : '' }}>Budha</option>
                    <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select>

                <textarea name="alamat" placeholder="Alamat" 
                          class="border p-2 rounded w-full col-span-2 h-16 placeholder:text-green-500">{{ old('alamat') }}</textarea>
                
                <input type="email" name="email" placeholder="Email" 
                       value="{{ old('email') }}" 
                       class="border p-2 rounded w-full placeholder:text-green-500">
                
                <input type="text" name="telepon" placeholder="Telepon" 
                       value="{{ old('telepon') }}" 
                       class="border p-2 rounded w-full placeholder:text-green-500">

                <input type="password" name="password" placeholder="Password" 
                       class="border p-2 rounded w-full placeholder:text-green-500">
                
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" 
                       class="border p-2 rounded w-full placeholder:text-green-500">

                <div class="col-span-2">
                    <div class="flex items-center space-x-2">
                        <label for="foto" 
                            class="cursor-pointer bg-green-600 text-white px-3 py-1.5 rounded text-xs hover:bg-green-700 inline-block">
                            Pilih Foto
                        </label>
                        <span class="text-green-700 text-xs">Upload pas foto 3x4</span>
                    </div>
                    <input type="file" id="foto" name="foto" class="hidden">
                </div>

                <button type="submit" 
                        class="bg-green-700 text-white px-3 py-2 rounded hover:bg-green-800 w-full col-span-2 text-xs">
                    Daftar
                </button>
            </form>

            <div class="text-center mt-2">
                <a href="{{ route('login') }}" class="text-xs text-green-700 hover:underline">Sudah punya akun? Login</a>
            </div>
        </div>
    </div>

</body>
</html>
