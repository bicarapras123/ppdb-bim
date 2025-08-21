<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function pendaftaran()
    {
        $pendaftaran = Pendaftaran::latest()->paginate(10);
        return view('admin.pendaftaran', compact('pendaftaran'));
    }
}
