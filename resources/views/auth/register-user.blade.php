<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Admin / Kepsek</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen py-10">

    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-sm">
        <div class="flex justify-center mb-5">
            <img src="/logo.png" alt="Logo Sekolah" class="h-16">
        </div>
        <h1 class="text-lg font-bold text-center mb-1">Registrasi Admin / Kepsek</h1>
        <p class="text-center text-gray-500 mb-5">SMK Bina Insan Mandiri</p>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register.user.submit') }}" method="POST" class="space-y-3">
            @csrf
            <input type="text" name="name" placeholder="Nama Lengkap"
                   value="{{ old('name') }}"
                   class="w-full border p-2 rounded focus:ring focus:ring-green-300 text-sm" required>

            <input type="email" name="email" placeholder="Email"
                   value="{{ old('email') }}"
                   class="w-full border p-2 rounded focus:ring focus:ring-green-300 text-sm" required>

            <input type="password" name="password" placeholder="Password"
                   class="w-full border p-2 rounded focus:ring focus:ring-green-300 text-sm" required>

            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                   class="w-full border p-2 rounded focus:ring focus:ring-green-300 text-sm" required>

            <select name="role" class="w-full border p-2 rounded focus:ring focus:ring-green-300 text-sm" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="kepsek" {{ old('role') == 'kepsek' ? 'selected' : '' }}>Kepala Sekolah</option>
            </select>

            <button type="submit" class="bg-green-600 text-white w-full py-2 rounded hover:bg-green-700 text-sm">
                Daftar
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('login.user') }}" class="text-sm text-blue-600 hover:underline">
                Sudah punya akun? Login di sini
            </a>
        </div>
    </div>

</body>
</html>
