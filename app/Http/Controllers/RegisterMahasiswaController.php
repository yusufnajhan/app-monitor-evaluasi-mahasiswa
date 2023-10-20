<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class RegisterMahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.register.index');
    }

    public function cekNIM(Request $request)
    {
        $nim = $request->input('nim');

        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if ($mahasiswa) {
            return redirect()->route('isi-data')->with('mahasiswa', $mahasiswa);
        } else {
            return redirect()->back()->with('error', 'NIM tidak ditemukan');
        }
    }

    public function edit()
    {
        return view('mahasiswa.register.edit');
    }
}
