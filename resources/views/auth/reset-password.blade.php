<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - PPDB Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="/logo.png" alt="Logo Sekolah" class="h-20">
        </div>

        <!-- Judul -->
        <h1 class="text-xl font-bold text-center mb-1">Reset Password</h1>
        <p class="text-center text-gray-500 mb-6">Masukkan password baru Anda</p>

        <!-- Pesan error -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <input type="email" name="email" placeholder="Email"
                   value="{{ old('email', $email ?? '') }}"
                   class="w-full border p-2 rounded focus:ring focus:ring-green-300" required>

            <input type="password" name="password" placeholder="Password Baru"
                   class="w-full border p-2 rounded focus:ring focus:ring-green-300" required>

            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                   class="w-full border p-2 rounded focus:ring focus:ring-green-300" required>

            <button type="submit" class="bg-green-600 text-white w-full py-2 rounded hover:bg-green-700">
                Reset Password
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
