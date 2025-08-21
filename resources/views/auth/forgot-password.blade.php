<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - PPDB Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="/logo.png" alt="Logo Sekolah" class="h-20">
        </div>

        <!-- Judul -->
        <h1 class="text-xl font-bold text-center mb-1">Lupa Password</h1>
        <p class="text-center text-gray-500 mb-6">Masukkan email yang terdaftar untuk reset password</p>

        <!-- Pesan sukses -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Pesan error -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('password.email') }}" method="POST" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Masukkan email yang terdaftar" 
                   value="{{ old('email') }}" 
                   class="w-full border p-2 rounded focus:ring focus:ring-green-300" required>

            <button type="submit" class="bg-green-600 text-white w-full py-2 rounded hover:bg-green-700">
                Kirim Link Reset
            </button>
        </form>

        <!-- Link ke login -->
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">
                Kembali ke Login
            </a>
        </div>
    </div>

</body>
</html>
