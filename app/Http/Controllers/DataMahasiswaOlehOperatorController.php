<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DosenWali;
use App\Models\Mahasiswa;
use App\Models\ProgresSkripsi;
use App\Models\KartuHasilStudi;
use App\Models\IsianRencanaSemester;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\ProgresPraktikKerjaLapangan;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Http\Requests\StoreDataMahasiswaOlehOperatorRequest;

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
        $this->authorize('create', Mahasiswa::class)
            ? Response::allow()
            : Response::denyWithStatus(403);

        $allDosenWali = DosenWali::select('id', 'nama')->get();

        return view('operator.data-mahasiswa.create', compact('allDosenWali'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDataMahasiswaOlehOperatorRequest $request)
    {
        $this->authorize('create', Mahasiswa::class)
            ? Response::allow()
            : Response::denyWithStatus(403);

        $data = $request->validated();

        $user = User::create([
            'email' => strtolower(str_replace(' ', '.', $data['nama'])) . '@students.undip.ac.id',
            'password' => Hash::make('12345'),
            'role' => 'mahasiswa'
        ]);

        $mahasiswa = Mahasiswa::create([
            'nama' => $data['nama'],
            'nim' => $data['nim'],
            'angkatan' => $data['angkatan'],
            'status' => 'Aktif',
            'user_id' => $user->id,
            'dosen_wali_id' => $data['dosen_wali']
        ]);

        $semester = $mahasiswa->hitungSemester();

        ProgresPraktikKerjaLapangan::create([
            'mahasiswa_id' => $mahasiswa->id
        ]);

        ProgresSkripsi::create([
            'mahasiswa_id' => $mahasiswa->id
        ]);

        for ($i = 1; $i <= $semester; $i++) {
            IsianRencanaSemester::create([
                'semester' => $i,
                'mahasiswa_id' => $mahasiswa->id
            ]);
            KartuHasilStudi::create([
                'semester' => $i,
                'mahasiswa_id' => $mahasiswa->id
            ]);
        }

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
    // public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
