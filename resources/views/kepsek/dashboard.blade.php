<x-sidebar-kepsek>
    {{-- Header --}}
    <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white p-6 rounded-2xl shadow-md">
        <h1 class="text-3xl font-bold">Dashboard Kepala Sekolah</h1>
        <p class="mt-1 text-sm text-green-100">Selamat datang, berikut ringkasan monitoring PPDB</p>
    </div>

    {{-- Statistik Ringkas --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-medium text-gray-500">Total Pendaftar</h2>
                    <p class="text-3xl font-bold text-blue-600">{{ $totalPendaftar }}</p>
                </div>
                <div class="p-3 bg-blue-100 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-500" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5V4H2v16h5m10-2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-medium text-gray-500">Siswa Lulus</h2>
                    <p class="text-3xl font-bold text-green-600">{{ $totalLulus }}</p>
                </div>
                <div class="p-3 bg-green-100 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-500" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-medium text-gray-500">Tidak Lulus</h2>
                    <p class="text-3xl font-bold text-red-600">{{ $totalTidakLulus }}</p>
                </div>
                <div class="p-3 bg-red-100 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-500" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-medium text-gray-500">Daftar Ulang</h2>
                    <p class="text-3xl font-bold text-purple-600">{{ $totalDaftarUlang }}</p>
                </div>
                <div class="p-3 bg-purple-100 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-500" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8c-1.104 0-2 .896-2 2v4a2 2 0 104 0v-4c0-1.104-.896-2-2-2z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Grafik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
        {{-- Pie Chart Kelulusan --}}
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Perbandingan Kelulusan</h2>
            <canvas id="chartKelulusan" class="h-64"></canvas>
        </div>

        {{-- Bar Chart Nilai --}}
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Distribusi Nilai Siswa</h2>
            <canvas id="chartNilai" class="h-64"></canvas>
        </div>
    </div>

{{-- Analisis & Insight --}}
<div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Card Analisis --}}
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
        <h2 class="text-xl font-bold text-gray-700 mb-4">📊 Analisis Data</h2>
        <ul class="space-y-4 text-gray-600">
            <li class="flex items-start">
                <div class="p-2 bg-blue-100 rounded-lg mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8c-1.104 0-2 .896-2 2v4a2 2 0 104 0v-4c0-1.104-.896-2-2-2z"/>
                    </svg>
                </div>
                <p>
                    <span class="font-semibold">Pendaftar:</span> 
                    Total <span class="font-bold text-blue-600">{{ $totalPendaftar }}</span> siswa mendaftar.  
                    <span class="italic">Menunjukkan minat masyarakat yang cukup tinggi.</span>
                </p>
            </li>
            <li class="flex items-start">
                <div class="p-2 bg-green-100 rounded-lg mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <p>
                    <span class="font-semibold">Kelulusan:</span> 
                    <span class="font-bold text-green-600">{{ $totalLulus }}</span> lulus, 
                    <span class="font-bold text-red-600">{{ $totalTidakLulus }}</span> tidak lulus.  
                    <span class="italic">Proporsi ini menunjukkan tingkat seleksi berjalan efektif.</span>
                </p>
            </li>
            <li class="flex items-start">
                <div class="p-2 bg-purple-100 rounded-lg mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8c-1.104 0-2 .896-2 2v4a2 2 0 104 0v-4c0-1.104-.896-2-2-2z"/>
                    </svg>
                </div>
                <p>
                    <span class="font-semibold">Daftar Ulang:</span> 
                    <span class="font-bold text-purple-600">{{ $totalDaftarUlang }}</span> siswa sudah melakukan daftar ulang.  
                    <span class="italic">Jika rendah, segera lakukan reminder ke orang tua/wali.</span>
                </p>
            </li>
        </ul>
    </div>

    {{-- Card Rekomendasi --}}
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-lg p-6 border border-gray-200">
        <h2 class="text-xl font-bold text-gray-700 mb-4">💡 Rekomendasi</h2>
        <div class="space-y-3 text-gray-700">
            <p class="flex items-start">
                <span class="mr-2">🔔</span> 
                Kirimkan notifikasi pengingat daftar ulang kepada siswa yang belum melakukan konfirmasi.
            </p>
            <p class="flex items-start">
                <span class="mr-2">☎️</span> 
                Buka jalur komunikasi (hotline/WhatsApp) untuk memudahkan orang tua dalam bertanya.
            </p>
            <p class="flex items-start">
                <span class="mr-2">📢</span> 
                Siapkan strategi promosi tambahan untuk meningkatkan pendaftar tahun depan.
            </p>
            <p class="flex items-start">
                <span class="mr-2">📈</span> 
                Evaluasi standar seleksi berdasarkan distribusi nilai agar lebih proporsional.
            </p>
        </div>
    </div>
</div>


    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data Kelulusan
        const ctxKelulusan = document.getElementById('chartKelulusan');
        new Chart(ctxKelulusan, {
            type: 'doughnut',
            data: {
                labels: ['Lulus', 'Tidak Lulus'],
                datasets: [{
                    data: [{{ $totalLulus }}, {{ $totalTidakLulus }}],
                    backgroundColor: ['#22c55e', '#ef4444'],
                    borderWidth: 2,
                    hoverOffset: 10
                }]
            }
        });

        // Data Nilai
        const ctxNilai = document.getElementById('chartNilai');
        new Chart(ctxNilai, {
            type: 'bar',
            data: {
                labels: {!! json_encode($nilaiSiswas->pluck('nama_siswa')) !!},
                datasets: [{
                    label: 'Nilai',
                    data: {!! json_encode($nilaiSiswas->pluck('nilai')) !!},
                    backgroundColor: '#3b82f6',
                    borderRadius: 8
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</x-sidebar-kepsek>
