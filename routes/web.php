<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;              // untuk siswa
use App\Http\Controllers\UserAuthController;          // untuk admin & kepsek
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KepsekController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ---------------- Home ----------------
Route::get('/', function () {
    return view('welcome');
});

// ---------------- Dashboard Siswa ----------------
Route::get('/dashboard', function () {
    if (!session()->has('user_id')) {
        return redirect()->route('login')->withErrors(['email' => 'Silakan login terlebih dahulu']);
    }
    return view('dashboard'); // resources/views/dashboard.blade.php
})->name('dashboard');

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

// ---------------- Dashboard Admin ----------------
Route::get('/admin/dashboard', function () {
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        return redirect()->route('login.user')->withErrors(['akses' => 'Anda tidak punya akses!']);
    }
    return app(AdminController::class)->dashboard();
})->name('admin.dashboard');

// ---------------- Fitur Admin: Data Pendaftar ----------------
Route::get('/admin/pendaftaran', function () {
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        return redirect()->route('login.user')->withErrors(['akses' => 'Anda tidak punya akses!']);
    }
    return app(AdminController::class)->pendaftaran();
})->name('admin.pendaftaran');

// ---------------- Dashboard Kepsek ----------------
Route::get('/kepsek/dashboard', function () {
    if (!Auth::check() || Auth::user()->role !== 'kepsek') {
        return redirect()->route('login.user')->withErrors(['akses' => 'Anda tidak punya akses!']);
    }
    return app(KepsekController::class)->dashboard();
})->name('kepsek.dashboard');

// ---------------- Fitur Kepsek: Laporan ----------------
Route::get('/kepsek/laporan', function () {
    if (!Auth::check() || Auth::user()->role !== 'kepsek') {
        return redirect()->route('login.user')->withErrors(['akses' => 'Anda tidak punya akses!']);
    }
    return app(KepsekController::class)->laporan();
})->name('kepsek.laporan');

// ---------------- Forgot Password ----------------
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

// ---------------- Reset Password ----------------
Route::get('/password/reset', fn () => redirect()->route('password.request'));
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');

// ---------------- Tes Role Tanpa Middleware ----------------
Route::get('/test-admin', function () {
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        return redirect()->route('login.user')->withErrors(['akses' => 'Anda bukan admin!']);
    }
    return "Halaman khusus Admin";
});

Route::get('/test-kepsek', function () {
    if (!Auth::check() || Auth::user()->role !== 'kepsek') {
        return redirect()->route('login.user')->withErrors(['akses' => 'Anda bukan kepsek!']);
    }
    return "Halaman khusus Kepsek";
});
