<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Calon Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <div class="flex justify-center mb-6">
            <img src="/logo.png" alt="Logo Sekolah" class="h-20">
        </div>
        <h1 class="text-xl font-bold text-center mb-1">Login Calon Siswa</h1>
        <p class="text-center text-gray-500 mb-6">SMK Bina Insan Mandiri</p>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Nama Pengguna atau Email" 
                   value="{{ old('email') }}" 
                   class="w-full border p-2 rounded focus:ring focus:ring-green-300">
            <input type="password" name="password" placeholder="Kata Sandi" 
                   class="w-full border p-2 rounded focus:ring focus:ring-green-300">

            <button type="submit" class="bg-green-600 text-white w-full py-2 rounded hover:bg-green-700">
                Masuk
            </button>
        </form>

        <div class="flex justify-center space-x-6 mt-4 text-sm">
    <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
        Lupa Password?
    </a>
    <span class="text-gray-400">|</span>
    <a href="{{ route('registrasi.index') }}" class="text-green-600 hover:underline">
        Buat Akun Baru
    </a>
</div>


</body>
</html>
