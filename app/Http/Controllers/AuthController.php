<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        // Jika sudah login → langsung ke dashboard
        if (session()->has('user_id')) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Pendaftaran::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Simpan session manual
            session([
                'user_id'    => $user->id,
                'user_nama'  => $user->nama,
                'user_email' => $user->email,
            ]);

            return redirect()->intended('/dashboard'); // ✅ masuk ke dashboard
        }
        
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Proses logout
    public function logout(Request $request)
    {
        // Hapus semua session user
        $request->session()->forget(['user_id', 'user_nama', 'user_email']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Anda berhasil logout.');
    }

    // Tampilkan form lupa password
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    // Kirim link reset password ke email
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
