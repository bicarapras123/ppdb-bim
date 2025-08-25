<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Online</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <!-- Alpine.js untuk dropdown -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="font-sans bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-green-700 text-white px-6 py-4 flex justify-between items-center">
        <h1 class="font-bold text-xl">PPDB ONLINE</h1>

        <!-- Menu Desktop -->
        <ul class="hidden md:flex space-x-6 items-center">
            <li><a href="#home" class="hover:text-gray-200">Home</a></li>
            <li><a href="#about" class="hover:text-gray-200">Tentang Kami</a></li>
            <li><a href="#alur" class="hover:text-gray-200">Alur Pendaftaran</a></li>
            <li><a href="#jurusan" class="hover:text-gray-200">Jurusan</a></li>
            <li><a href="#testimoni" class="hover:text-gray-200">Testimoni</a></li>
            <li><a href="{{ route('registrasi.index') }}" class="hover:text-gray-200">Daftar</a></li>
            
            <!-- Dropdown Login Desktop -->
            <li x-data="{ open: false }" class="relative">
                <button @click="open = !open" 
                        class="hover:text-gray-200 flex items-center space-x-1 px-3 py-1 rounded-md transition duration-200">
                    <!-- Ikon User -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5.121 17.804A9 9 0 1118.879 6.196 9 9 0 015.121 17.804z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Login</span>
                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     @click.away="open = false"
                     class="absolute right-0 mt-2 w-44 bg-white text-gray-800 rounded-lg shadow-lg py-1 text-sm z-50">
                    <a href="{{ route('login') }}" 
                       class="flex items-center px-3 py-2 hover:bg-green-50 hover:text-green-700 transition">
                        🎓 <span class="ml-2">Login Siswa</span>
                    </a>
                    <a href="{{ route('login.user') }}" 
                       class="flex items-center px-3 py-2 hover:bg-green-50 hover:text-green-700 transition">
                        🛠 <span class="ml-2">Login Admin/Kepsek</span>
                    </a>
                </div>
            </li>
        </ul>

        <!-- Tombol Mobile -->
        <div class="md:hidden">
            <button id="menu-toggle" class="focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-6 w-6" fill="none" 
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" 
                          stroke-linejoin="round" 
                          stroke-width="2" 
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Menu Mobile -->
    <div id="mobile-menu" class="hidden bg-green-600 text-white px-6 py-4 md:hidden space-y-2">
        <a href="#home" class="block hover:text-gray-200">Home</a>
        <a href="#about" class="block hover:text-gray-200">Tentang Kami</a>
        <a href="#alur" class="block hover:text-gray-200">Alur Pendaftaran</a>
        <a href="#jurusan" class="block hover:text-gray-200">Jurusan</a>
        <a href="#testimoni" class="block hover:text-gray-200">Testimoni</a>
        <a href="{{ route('registrasi.index') }}" class="block hover:text-gray-200">Daftar</a>
        
        <!-- Dropdown Login Mobile -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" 
                    class="w-full text-left hover:text-gray-200 flex items-center space-x-2 py-2">
                <!-- Ikon User -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A9 9 0 1118.879 6.196 9 9 0 015.121 17.804z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>Login</span>
                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- Dropdown isi mobile -->
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 class="mt-2 space-y-1 pl-6 text-sm">
                <a href="{{ route('login') }}" class="block hover:text-gray-200">🎓 Login Siswa</a>
                <a href="{{ route('login.user') }}" class="block hover:text-gray-200">🛠 Login Admin/Kepsek</a>
            </div>
        </div>
    </div>

    <!-- Script Toggle Mobile Menu -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>


    <!-- Hero Section -->
    <section class="relative bg-green-600 text-white text-center py-16">
        <h2 class="text-3xl md:text-5xl font-bold mb-4">
            ISLAMIC SCHOOL SMK <br> BINA INSAN MANDIRI
        </h2>
        <p class="max-w-2xl mx-auto text-lg mb-6">
            Sekolah kami hadir sebagai jawaban atas kebutuhan akan pendidikan yang seimbang...
        </p>
        <a href="#daftar" class="bg-white text-green-700 px-6 py-3 rounded-lg font-semibold shadow hover:bg-gray-200">
            YUK DAFTAR SEKARANG
        </a>
    </section>

    <!-- Menu Cards -->
    <section class="grid grid-cols-1 md:grid-cols-4 gap-6 p-10">
        <div class="bg-green-700 text-white text-center p-6 rounded-lg shadow hover:bg-green-800">
            <span class="text-3xl">▶️</span>
            <h3 class="font-bold mt-3">PERKENALAN BIM</h3>
        </div>
        <div class="bg-green-700 text-white text-center p-6 rounded-lg shadow hover:bg-green-800">
            <span class="text-3xl">❓</span>
            <h3 class="font-bold mt-3">PERTANYAAN</h3>
        </div>
        <div class="bg-green-700 text-white text-center p-6 rounded-lg shadow hover:bg-green-800">
            <span class="text-3xl">📍</span>
            <h3 class="font-bold mt-3">LOKASI</h3>
        </div>
        <div class="bg-green-700 text-white text-center p-6 rounded-lg shadow hover:bg-green-800">
            <span class="text-3xl">👤</span>
            <h3 class="font-bold mt-3">KONTAK KAMI</h3>
        </div>
    </section>

    <!-- Kenapa Harus SMK BIM -->
    <section class="bg-green-700 text-white py-16 px-6 md:px-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">KENAPA HARUS SMK BIM?</h2>
            <p class="text-lg max-w-2xl mx-auto">
                Bukan cuma sekolah, ini adalah tempat di mana masa depanmu didesain. 
                Penasaran bagaimana caranya? Cari tahu di sini..
            </p>
        </div>

        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-12 items-center">

            <!-- Kolom Kiri -->
            <div>
                <h3 class="text-2xl font-semibold mb-4">Lingkungan Belajar yang Inovatif dan Religius</h3>
                <img src="sekolahbim.jpg" alt="Lingkungan Belajar" 
                     class="rounded-lg shadow-lg mb-4">
                <p class="text-base leading-relaxed">
                    Sekolah kami bukan hanya gedung dengan ruang kelas, melainkan sebuah ekosistem 
                    belajar yang dinamis dan Islami. Kami menciptakan suasana yang kondusif di mana siswa merasa 
                    aman, nyaman, dan terinspirasi untuk terus belajar.
                </p>
            </div>

            <!-- Kolom Kanan -->
            <div>
                <h3 class="text-2xl font-semibold mb-4">Fasilitas Modern untuk Pengembangan Bakat Abad ke-21</h3>
                <p class="text-base leading-relaxed mb-4">
                    Sebagai sekolah Islam modern, kami memahami bahwa masa depan membutuhkan keterampilan yang adaptif dan kreatif. 
                    Oleh karena itu, kami menyediakan fasilitas yang menunjang setiap potensi siswa.
                    Dari laboratorium sains yang lengkap, studio multimedia yang canggih, hingga program ekstrakurikuler seperti robotik, 
                    desain grafis, dan tahfidz.
                </p>
                <img src="sekolahbim.jpg" alt="Fasilitas Modern" 
                     class="rounded-lg shadow-lg">
            </div>

        </div>
    </section>

        <!-- Sambutan Video -->
        <section class="bg-green-700 text-white py-16 px-6 md:px-20 text-center">
        <div class="max-w-4xl mx-auto">

            <!-- Teks Sambutan -->
            <p class="mb-6 text-lg leading-relaxed">
                Dengan program pembiasaan ibadah, seperti Shalat Dhuha dan tadarus Al-Qur'an, 
                kami menumbuhkan kedekatan spiritual tanpa menghilangkan semangat eksplorasi dan kreativitas.
            </p>

            <!-- Video Thumbnail -->
            <div class="relative">
                <img src="sekolahbim.jpg" 
                     alt="Video Sambutan Sekolah" 
                     class="rounded-lg shadow-lg w-full">

                <!-- Tombol Play -->
                <a href="https://www.youtube.com/watch?v=00iup9mTXJg" target="_blank"
                   class="absolute inset-0 flex items-center justify-center">
                    <div class="bg-teal-500 text-white w-16 h-16 flex items-center justify-center rounded-full shadow-lg hover:bg-teal-600 transition">
                        ▶
                    </div>
                </a>
            </div>

            <!-- Teks Bawah -->
            <div class="mt-6">
                <h3 class="text-2xl font-bold mb-2">Selamat datang di sekolah kami!</h3>
                <p class="text-base">
                    Kami sangat senang Anda menjadi bagian dari komunitas yang luar biasa ini. 
                    Sekolah kami tidak hanya tempat untuk belajar, tetapi juga tempat di mana mimpi dimulai 
                    dan bakat dikembangkan.
                </p>
            </div>
        </div>
    </section>

        <!-- Alur Pendaftaran PPDB 2025 -->
        <section class="bg-green-600 text-white py-16 px-6 md:px-20">
        <div class="max-w-6xl mx-auto text-center">

            <!-- Judul -->
            <h2 class="text-3xl font-bold mb-4">ALUR PENDAFTARAN PPDB 2025</h2>
            <p class="mb-12 text-lg">
                Waktunya PPDB Online. Segera daftarkan diri Anda agar tidak kehabisan kuota!
            </p>

            <!-- Grid Tahapan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-gray-800">
                
                <!-- 1. Pendaftaran Akun -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-4xl mb-3">👤</div>
                    <h3 class="font-bold text-xl mb-2">1. Pendaftaran Akun</h3>
                    <p>Calon siswa membuat akun di situs web PPDB dengan data diri dasar, email, dan password.</p>
                </div>

                <!-- 2. Login -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-4xl mb-3">➡️</div>
                    <h3 class="font-bold text-xl mb-2">2. Login</h3>
                    <p>Setelah akun dibuat, calon siswa bisa login untuk mengakses portal PPDB.</p>
                </div>

                <!-- 3. Verifikasi Dokumen -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-4xl mb-3">⚙️</div>
                    <h3 class="font-bold text-xl mb-2">3. Verifikasi Dokumen</h3>
                    <p>Panitia PPDB akan memverifikasi dokumen yang diunggah oleh calon siswa.</p>
                </div>

                <!-- 4. Seleksi -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-4xl mb-3">✏️</div>
                    <h3 class="font-bold text-xl mb-2">4. Seleksi</h3>
                    <p>Seleksi dilakukan berdasarkan jurusan yang dipilih dan kriteria yang telah ditentukan.</p>
                </div>

                <!-- 5. Pengumuman -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-4xl mb-3">📅</div>
                    <h3 class="font-bold text-xl mb-2">5. Pengumuman</h3>
                    <p>Hasil seleksi diumumkan melalui portal PPDB sesuai jadwal yang ditentukan.</p>
                </div>

                <!-- 6. Daftar Ulang -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-4xl mb-3">📑</div>
                    <h3 class="font-bold text-xl mb-2">6. Daftar Ulang</h3>
                    <p>Calon siswa yang dinyatakan lolos melakukan daftar ulang sesuai prosedur sekolah.</p>
                </div>

            </div>
        </div>
    </section>

        <!-- Jurusan -->
        <section class="bg-green-600 text-white py-16 px-6 md:px-20">
        <div class="max-w-6xl mx-auto text-center">

            <!-- Judul -->
            <h2 class="text-3xl font-bold mb-4">JURUSAN</h2>
            <p class="mb-12 text-lg">
                "Bingung mau pilih jurusan apa? Yuk, kenalan dengan berbagai program studi di sekolah kami
                yang bisa mengasah bakat dan minatmu"
            </p>

            <!-- Grid Jurusan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-gray-800">
                
                <!-- Akuntansi -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="animasi1.jpg" alt="Akuntansi" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2">AKUNTANSI</h3>
                        <p>Jurusan ini berfokus pada ilmu pencatatan, pengolahan, dan pelaporan informasi keuangan.
                           Ilmu yang dipelajari tidak hanya sebatas hitung-hitungan, tetapi juga analisis keuangan.</p>
                    </div>
                </div>

                <!-- Pemasaran -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="animasi2.jpg" alt="Pemasaran" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2">PEMASARAN</h3>
                        <p>Jurusan ini mempelajari strategi dan taktik untuk mempromosikan produk, layanan, atau gagasan
                           kepada konsumen agar lebih dikenal dan diminati.</p>
                    </div>
                </div>

                <!-- Broadcasting -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="animasi3.jpeg" alt="Broadcasting" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2">BROADCASTING</h3>
                        <p>Jurusan ini mendalami produksi dan penyebaran konten melalui media seperti radio, TV,
                           hingga platform digital. Cocok untuk yang suka dunia komunikasi dan media.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

        <!-- Testimoni -->
        <section class="bg-green-600 text-white py-16 px-6 md:px-20">
        <div class="max-w-6xl mx-auto text-center">

            <!-- Judul -->
            <h2 class="text-3xl font-bold mb-4">TESTIMONI</h2>
            <p class="mb-12 text-lg">
                Berikut adalah testimoni dari alumni-alumni sebelum kalian!
            </p>

            <!-- Grid Testimoni -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Testimoni 1 -->
                <div class="bg-white text-gray-800 rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-lg mb-2">Aldenusa Ramadhan</h3>
                    <p class="text-sm">
                        Sebagai alumni, saya merasa sangat beruntung pernah menempuh pendidikan di sekolah ini.
                        Sekolah ini tidak hanya sekadar tempat menuntut ilmu, tetapi juga wadah untuk membentuk
                        karakter dan akhlak mulia. Lingkungan Islami dan suportif menjadi bekal berharga yang
                        terus saya rasakan manfaatnya hingga saat ini.
                    </p>
                </div>

                <!-- Testimoni 2 -->
                <div class="bg-white text-gray-800 rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-lg mb-2">Sarah Jhinson</h3>
                    <p class="text-sm">
                        Salah satu hal yang paling berkesan adalah bimbingan para guru dan ustaz/ustazah.
                        Mereka tidak hanya berperan sebagai pengajar, tetapi juga sebagai pendidik yang tulus
                        dan penuh kasih sayang. Mereka tak hanya mengajarkan materi pelajaran, tetapi juga menanamkan
                        nilai-nilai keislaman, seperti kejujuran, disiplin, dan tanggung jawab.
                    </p>
                </div>

                <!-- Testimoni 3 -->
                <div class="bg-white text-gray-800 rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-lg mb-2">William Anderson</h3>
                    <p class="text-sm">
                        Kurikulum di sekolah ini juga patut diacungi jempol. Kombinasi antara pelajaran umum
                        yang berkualitas dengan pelajaran agama yang mendalam membuat kami memiliki fondasi
                        yang kuat di kedua bidang. Saya yakin, bekal ilmu yang kami dapat akan menjadi sangat
                        bermanfaat di dunia dan akhirat.
                    </p>
                </div>

                <!-- Testimoni 4 -->
                <div class="bg-white text-gray-800 rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-lg mb-2">Amanda Jepson</h3>
                    <p class="text-sm">
                        Secara keseluruhan, saya sangat bangga menjadi bagian dari keluarga besar sekolah ini.
                        Sekolah ini telah membentuk saya menjadi pribadi yang beriman, berilmu, dan berakhlak mulia.
                        Nilai-nilai yang saya dapatkan akan terus menjadi bekal berharga menghadapi setiap tantangan hidup.
                    </p>
                </div>

            </div>
        </div>
    </section>

        <!-- FAQ -->
        <section class="bg-green-600 text-white py-16 px-6 md:px-20">
        <div class="max-w-4xl mx-auto">
            
            <!-- Judul -->
            <h2 class="text-3xl font-bold mb-6 text-center">
                PERTANYAAN SEPUTAR PPDB ONLINE
            </h2>

            <!-- Accordion -->
            <div class="space-y-4">

                <!-- FAQ 1 -->
                <details class="bg-white text-gray-800 rounded-lg shadow-md p-4">
                    <summary class="font-semibold cursor-pointer">
                        1. Apa itu PPDB Online?
                    </summary>
                    <p class="mt-2 text-sm">
                        PPDB Online adalah sistem penerimaan siswa baru yang dilakukan secara daring.
                        Proses ini mencakup pendaftaran, verifikasi dokumen, seleksi, hingga pengumuman hasil
                        yang dapat diakses melalui situs resmi yang telah ditentukan. Tujuannya adalah untuk
                        meningkatkan transparansi, akuntabilitas, dan efisiensi dalam proses pendaftaran.
                    </p>
                </details>

                <!-- FAQ 2 -->
                <details class="bg-white text-gray-800 rounded-lg shadow-md p-4">
                    <summary class="font-semibold cursor-pointer">
                        2. Siapa saja yang bisa mendaftar PPDB online?
                    </summary>
                    <p class="mt-2 text-sm">
                        Semua calon siswa baru yang memenuhi persyaratan pendaftaran sesuai ketentuan
                        yang berlaku di sekolah ini.
                    </p>
                </details>

                <!-- FAQ 3 -->
                <details class="bg-white text-gray-800 rounded-lg shadow-md p-4">
                    <summary class="font-semibold cursor-pointer">
                        3. Kapan jadwal PPDB online dimulai?
                    </summary>
                    <p class="mt-2 text-sm">
                        Jadwal PPDB online biasanya diumumkan di website resmi sekolah sesuai kalender akademik.
                        Silakan pantau secara berkala agar tidak ketinggalan informasi.
                    </p>
                </details>

                <!-- FAQ 4 -->
                <details class="bg-white text-gray-800 rounded-lg shadow-md p-4">
                    <summary class="font-semibold cursor-pointer">
                        4. Apa yang terjadi jika saya tidak melakukan daftar ulang setelah diterima?
                    </summary>
                    <p class="mt-2 text-sm">
                        Jika calon siswa tidak melakukan daftar ulang sesuai jadwal yang ditentukan,
                        maka dianggap mengundurkan diri dan kesempatan akan diberikan kepada calon lain.
                    </p>
                </details>

                <!-- FAQ 5 -->
                <details class="bg-white text-gray-800 rounded-lg shadow-md p-4">
                    <summary class="font-semibold cursor-pointer">
                        5. Situs web PPDB lambat atau error. Apa yang harus dilakukan?
                    </summary>
                    <p class="mt-2 text-sm">
                        Jika website mengalami kendala teknis, coba akses kembali beberapa saat kemudian
                        atau hubungi panitia PPDB melalui kontak resmi yang tersedia.
                    </p>
                </details>

            </div>
        </div>
    </section>

    <!-- Footer -->
<footer class="bg-green-700 text-white mt-0">
    <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-10">

        <!-- About -->
        <div>
            <h3 class="text-xl font-bold mb-3">ISLAMIC SCHOOL SMK BIM</h3>
            <p class="text-sm leading-relaxed">
                SMK BINA INSAN MANDIRI Islamic School adalah Sekolah berbasis Kurikulum
                Ciri Khas Sekolah Islam modern dengan pengalaman lebih dari 30 tahun.
                Menjadi partner orang tua dalam mendidik anak dengan hati.
            </p>
        </div>

        <!-- Social Media -->
        <div>
            <h3 class="text-xl font-bold mb-3">Social Media</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-yellow-300">Youtube</a></li>
                <li><a href="#" class="hover:text-yellow-300">Facebook</a></li>
                <li><a href="#" class="hover:text-yellow-300">Instagram</a></li>
                <li><a href="#" class="hover:text-yellow-300">Google Maps</a></li>
            </ul>
        </div>
<!-- Contact -->
<div>
    <h3 class="text-xl font-bold mb-3">Contact Us</h3>
    <p class="text-sm">
        BIM ISLAMIC SCHOOL <br>
        Jl. Meruya Ilir Raya Jl. Muslidfah Blok A, RT.1/RW.1, Srengseng,
        Kec. Kembangan, Kota Jakarta Barat, DKI Jakarta 11630
    </p>
    <p class="mt-2 text-sm">Phone: (021) 5861314</p>
    <p class="text-sm">Email: 
        <a href="mailto:bim@gmail.com" class="hover:underline">bim@gmail.com</a>
    </p>
    
    <!-- Map -->
    <div class="mt-3 rounded-lg overflow-hidden shadow">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4880674591864!2d106.7553528740248!3d-6.199157160727659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f73b136e6953%3A0xefbf6b8064645fd!2sBIM%20ISLAMIC%20SCHOOL!5e0!3m2!1sid!2sid!4v1756090836868!5m2!1sid!2sid" 
            width="100%" 
            height="200" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>
</div>

<!-- Bottom -->
<div class="bg-green-800 text-center text-xs py-3">
    © Copyright 2025 <span class="font-bold">BIM ISLAMIC SCHOOL</span> | Designed by Aldenusa Ramadhan
</div>
</footer>

</body>
</html>
