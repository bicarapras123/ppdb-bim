<?php

use App\Http\Controllers\SiswaPengumumanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;              // untuk siswa
use App\Http\Controllers\UserAuthController;          // untuk admin & kepsek
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\JadwalSeleksiController;     // CRUD jadwal seleksi
use App\Http\Controllers\NilaiSiswaController;        // CRUD nilai siswa
use App\Http\Controllers\PengumumanSeleksiController; // CRUD pengumuman
use App\Http\Controllers\DashboardController;         // Dashboard siswa (ambil jadwal seleksi)
use App\Http\Controllers\DaftarUlangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ---------------- Home ----------------
Route::get('/', fn () => view('welcome'));

// ---------------- Dashboard Siswa ----------------
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/pengumuman', [SiswaPengumumanController::class, 'index'])->name('pengumuman-siswa.blade');

// --------------- Route daftar ulang -------------
Route::resource('daftar-ulang', DaftarUlangController::class);

// ---------------- Pendaftaran Siswa ----------------
Route::get('/registrasi', [PendaftaranController::class, 'index'])->name('registrasi.index');
Route::post('/registrasi', [PendaftaranController::class, 'store'])->name('registrasi.store');

// ---------------- Auth Siswa ----------------
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ---------------- Auth Admin & Kepsek ----------------
Route::get('/login-user', [UserAuthController::class, 'showLogin'])->name('login.user');
Route::post('/login-user', [UserAuthController::class, 'login'])->name('login.user.submit');
Route::post('/logout-user', [UserAuthController::class, 'logout'])->name('logout.user');

// ---------------- Register Admin & Kepsek ----------------
Route::get('/register-user', [UserAuthController::class, 'showRegister'])->name('register.user');
Route::post('/register-user', [UserAuthController::class, 'register'])->name('register.user.submit');

// =====================================================================
// ADMIN AREA
// =====================================================================
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => function ($request, $next) {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login.user')->withErrors(['akses' => 'Silakan login sebagai Admin!']);
        }
        return $next($request);
    }
], function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // CRUD Jadwal Seleksi
    Route::resource('jadwal-seleksi', JadwalSeleksiController::class)
        ->parameters(['jadwal-seleksi' => 'jadwal'])
        ->names([
            'index'   => 'jadwal.index',
            'create'  => 'jadwal.create',
            'store'   => 'jadwal.store',
            'show'    => 'jadwal.show',
            'edit'    => 'jadwal.edit',
            'update'  => 'jadwal.update',
            'destroy' => 'jadwal.destroy',
        ]);

    // ✅ Tambahan route update status jadwal
    Route::put('/jadwal-seleksi/{id}/status', [JadwalSeleksiController::class, 'updateStatus'])
        ->name('jadwal.updateStatus');

    // CRUD Nilai Siswa
    Route::resource('nilai', NilaiSiswaController::class)->names([
        'index'   => 'nilai.index',
        'create'  => 'nilai.create',
        'store'   => 'nilai.store',
        'show'    => 'nilai.show',
        'edit'    => 'nilai.edit',
        'update'  => 'nilai.update',
        'destroy' => 'nilai.destroy',
    ]);

    // CRUD Pengumuman Seleksi
    Route::resource('pengumuman', PengumumanSeleksiController::class)->names([
        'index'   => 'pengumuman.index',
        'create'  => 'pengumuman.create',
        'store'   => 'pengumuman.store',
        'show'    => 'pengumuman.show',
        'edit'    => 'pengumuman.edit',
        'update'  => 'pengumuman.update',
        'destroy' => 'pengumuman.destroy',
    ]);

    // ✅ Validasi Pendaftaran
    Route::get('pendaftaran/{id}/verifikasi', [PendaftaranController::class, 'verifikasi'])
        ->name('pendaftaran.verifikasi');
    Route::get('pendaftaran/{id}/tolak', [PendaftaranController::class, 'tolak'])
        ->name('pendaftaran.tolak');
});

// =====================================================================
// KEPSEK AREA
// =====================================================================
Route::group([
    'prefix' => 'kepsek',
    'as' => 'kepsek.',
    'middleware' => function ($request, $next) {
        if (!Auth::check() || Auth::user()->role !== 'kepsek') {
            return redirect()->route('login.user')->withErrors(['akses' => 'Silakan login sebagai Kepsek!']);
        }
        return $next($request);
    }
], function () {
    // Dashboard Kepsek
    Route::get('/dashboard', [KepsekController::class, 'dashboard'])->name('dashboard');

    // ✅ Laporan Kepsek (index & show)
    Route::get('/laporan', [KepsekController::class, 'laporan'])->name('laporan.index');
});

// ---------------- Forgot Password ----------------
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

// ---------------- Reset Password ----------------
Route::get('/password/reset', fn () => redirect()->route('password.request'));
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');

// ---------------- Tes Role ----------------
Route::get('/test-admin', fn () =>
    Auth::check() && Auth::user()->role === 'admin'
        ? "Halaman khusus Admin"
        : redirect()->route('login.user')->withErrors(['akses' => 'Anda bukan admin!'])
);

Route::get('/test-kepsek', fn () =>
    Auth::check() && Auth::user()->role === 'kepsek'
        ? "Halaman khusus Kepsek"
        : redirect()->route('login.user')->withErrors(['akses' => 'Anda bukan kepsek!'])
);
