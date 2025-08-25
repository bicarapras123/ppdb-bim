<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PPDB Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100 font-sans">

<div x-data="{ open: true }" class="flex min-h-screen">
    
    <!-- Sidebar -->
    <aside x-show="open" 
           class="w-60 bg-green-700 text-white min-h-screen flex flex-col transition-transform duration-300"
           x-transition:enter="transform transition ease-out duration-200"
           x-transition:enter-start="-translate-x-full"
           x-transition:enter-end="translate-x-0"
           x-transition:leave="transform transition ease-in duration-200"
           x-transition:leave-start="translate-x-0"
           x-transition:leave-end="-translate-x-full">

        <!-- Judul Sidebar -->
        <div class="p-5 flex items-center justify-between border-b border-green-600">
            <div class="flex items-center gap-3">
                <img src="{{ asset('logo.png') }}" 
                    alt="Logo PPDB" 
                    class="w-10 h-10 rounded-full shadow bg-white object-cover">
                <h1 class="text-lg font-bold tracking-wide">PPDB ADMIN</h1>
            </div>
            <button @click="open = false" class="md:hidden focus:outline-none text-white">
                ✖
            </button>
        </div>

        <!-- Menu Sidebar -->
        <nav class="flex-1 p-4 space-y-1 text-sm">
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-green-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l9-9 9 9M4 10v10h6V14h4v6h6V10"/>
                </svg>
                <span>Pendaftaran</span>
            </a>

            <a href="{{ route('admin.jadwal.index') }}" 
            class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-green-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                        d="M8 7V3m8 4V3m-9 8h10m-12 4h14m-16 4h18M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>Daftar Ulang</span>
            </a>

            <a href="{{ route('admin.nilai.index') }}" 
            class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-green-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                        d="M12 6v6l4 2m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Nilai Siswa</span>
            </a>

            <a href="{{ route('admin.pengumuman.index') }}" 
            class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-green-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                        d="M12 6v6h4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Pengumuman Seleksi</span>
            </a>

             <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" 
                        class="w-full flex items-center gap-3 px-3 py-2 rounded-md hover:bg-red-600 transition text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12H3m12-6l6 6-6 6"/>
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </nav>
    </aside>

    <!-- Konten Utama -->
    <div class="flex-1 flex flex-col">
        
        <!-- Topbar -->
        <header class="bg-white shadow px-4 py-3 flex justify-between items-center">
            <button @click="open = true" class="md:hidden focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </header>

        <!-- Slot Konten -->
        <main class="p-6 bg-gray-50 min-h-screen">
            <div class="max-w-6xl mx-auto"> <!-- 🔹 Tambahkan container tengah -->
                {{ $slot }}
            </div>
        </main>
    </div>
</div>

</body>
</html>
