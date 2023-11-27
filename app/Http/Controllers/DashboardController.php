<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'operator') {
            return view('operator.dashboard', compact('user'));
        } else if ($user->role === 'departemen') {
            return view('departemen.dashboard', compact('user'));
        } else if ($user->role === 'dosenWali') {
            return view('dosen-wali.dashboard', compact('user'));
        } else if ($user->role === 'mahasiswa') {
            if ($user->mahasiswa->jalur_masuk === NULL) {
                return redirect('/isi-data/' . $user->mahasiswa->nim);
            } else {
                return view('mahasiswa.dashboard', compact('user'));
            }
        }
    }
}
