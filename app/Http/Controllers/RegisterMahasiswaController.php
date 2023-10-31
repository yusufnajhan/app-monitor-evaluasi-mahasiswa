<?php

namespace App\Http\Controllers;

use App\Http\Requests\CekNIMRequest;
use App\Http\Requests\UpdateDataMahasiswaOlehMahasiswaRequest;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterMahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.register.index');
    }

    public function cekNIM(CekNIMRequest $request)
    {
        $nim = $request->input('nim');
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if ($mahasiswa && !$mahasiswa->alamat) {
            return redirect()->route('lengkapi-data', ['nim' => $mahasiswa->nim]);
        } else if ($mahasiswa && $mahasiswa->jalur_masuk) {
            return redirect()->route('login')->with('loginError', 'Anda sudah daftar, silakan login!');
        } else {
            return redirect()->back()->with('error', 'NIM tidak ditemukan');
        }
    }

    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if ($mahasiswa) {
            return view('mahasiswa.register.edit', compact('mahasiswa'));
        } else {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan');
        }
    }

    public function update(UpdateDataMahasiswaOlehMahasiswaRequest $request, $nim)
    {
        // Ambil model Mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $userMahasiswa = $mahasiswa->user;

        if ($mahasiswa && $userMahasiswa) {
            $mahasiswa->jalur_masuk = $request->input('jalur_masuk');
            $mahasiswa->no_telepon = $request->input('no_telepon');
            $mahasiswa->alamat = $request->input('alamat');
            $mahasiswa->kota = $request->input('kota');
            $mahasiswa->provinsi = $request->input('provinsi');

            $mahasiswa->save();

            $userMahasiswa->email = $request->input('email');

            // Periksa apakah input password tidak kosong, jika tidak kosong, simpan password baru
            if ($request->input('password')) {
                $userMahasiswa->password = bcrypt($request->input('password'));
                $userMahasiswa->save();
            }

            Auth::login($userMahasiswa);
            return redirect()->route('dashboard');
        }
    }
}
