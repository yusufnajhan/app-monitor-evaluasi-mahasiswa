<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use App\Http\Requests\StoreDataMahasiswaOlehOperatorRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\DosenWali;

class DataMahasiswaOlehOperatorController extends Controller
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
        return view('operator.data-mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDataMahasiswaOlehOperatorRequest $request)
    {
        $data = $request->validated();
        $daftarDosen = DosenWali::with('mahasiswa')->get();
        $dosenTerkecil = $daftarDosen->sortBy(function ($dosen) {
            return $dosen->jumlahMahasiswaWali();
        })->first();

        $user = User::factory()->create([
            'email' => strtolower(str_replace(' ', '.', $data['nama'])) . '@students.undip.ac.id',
            'password' => bcrypt('12345'),
            'role' => 'mahasiswa'
        ]);

        Mahasiswa::create([
            'nama' => $data['nama'],
            'nim' => $data['nim'],
            'angkatan' => $data['angkatan'],
            'status' => $data['status'],
            'user_id' => $user->id, // Hubungkan user dengan mahasiswa
            'dosen_wali_id' => $dosenTerkecil->id
        ]);

        return redirect()->route('dashboard');
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
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}