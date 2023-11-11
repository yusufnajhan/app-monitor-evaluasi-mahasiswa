<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateDataMahasiswaOlehMahasiswaRequest;
use App\Models\Provinsi;
use Illuminate\Support\Facades\Auth;

class LengkapiDataMahasiswaOlehMahasiswa extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $provinsi = Provinsi::all();

        return view('mahasiswa.lengkapi-data.edit', compact('mahasiswa', 'provinsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataMahasiswaOlehMahasiswaRequest $request, $nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $userMahasiswa = $mahasiswa->user;

        if ($mahasiswa && $userMahasiswa) {
            $mahasiswa->jalur_masuk = $request->input('jalur_masuk');
            $mahasiswa->no_telepon = $request->input('no_telepon');
            $mahasiswa->alamat = $request->input('alamat');
            $mahasiswa->kota = $request->input('kota');
            $mahasiswa->provinsi = $request->input('provinsi');

            // $userMahasiswa->email = $request->input('email');
            $userMahasiswa->password = bcrypt($request->input('password'));

            $mahasiswa->save();
            $userMahasiswa->save();

            Auth::login($userMahasiswa);
            return redirect()->route('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
