<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Pendaftaran;

class ForgotPasswordController extends Controller
{
    // tampilkan form lupa password
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    // kirim email reset password
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = Pendaftaran::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan di sistem kami.']);
        }

        // buat token
        $token = Str::random(64);

        // simpan ke tabel password_resets
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        // kirim email (contoh sederhana tanpa view mail)
        Mail::raw("Klik link berikut untuk reset password: " . url("/reset-password/" . $token),
            function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password PPDB Online');
            }
        );

        return back()->with('success', 'Link reset password sudah dikirim ke email Anda.');
    }

    // tampilkan form reset password
    public function showResetForm($token)
    {
        return view('auth.reset-password', compact('token'));
    }

    // proses update password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $check = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$check) {
            return back()->withErrors(['email' => 'Token reset tidak valid atau sudah kedaluwarsa.']);
        }

        // update password di tabel pendaftaran
        Pendaftaran::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        // hapus token reset
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Password berhasil direset. Silakan login.');
    }
}
