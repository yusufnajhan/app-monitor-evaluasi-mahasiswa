<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\ProgresPraktikKerjaLapangan;
use App\Http\Requests\StoreProgresPraktikKerjaLapanganRequest;
use App\Http\Requests\UpdateProgresPKLOlehMahasiswaRequest;
use App\Http\Requests\UpdateProgresPraktikKerjaLapanganRequest;

class DataPKLOlehMahasiswaController extends Controller
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
    // public function store(StoreProgresPraktikKerjaLapanganRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->select()->first();
        if (!$mahasiswa) {
            abort(404);
        }
        $semester = $mahasiswa->hitungSemester();

        $pkl = ProgresPraktikKerjaLapangan::where('mahasiswa_id', $mahasiswa->id)
            ->first();
        if (!$pkl) {
            abort(404);
        }

        return view('mahasiswa.pkl.show', compact('pkl', 'nim', 'semester'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if (!$mahasiswa) {
            abort(404);
        }

        $pkl = ProgresPraktikKerjaLapangan::where('mahasiswa_id', $mahasiswa->id)
            ->first();
        if (!$pkl) {
            abort(404);
        }

        return view('mahasiswa.pkl.edit', compact('pkl', 'nim'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgresPKLOlehMahasiswaRequest $request, $nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if (!$mahasiswa) {
            abort(404);
        }

        $pkl = ProgresPraktikKerjaLapangan::where('mahasiswa_id', $mahasiswa->id)
            ->first();
        if (!$pkl) {
            abort(404);
        }

        $data = $request->validated();

        $pkl->semester = $data['semester'];
        $pkl->nilai = $data['nilai'];
        $namaFileBaru = 'pkl_' . str_replace(' ', '_', strtolower($mahasiswa->nama)) . '.pdf';
        $pkl->nama_file = $request->file('nama_file')->storeAs('progres-pkl', $namaFileBaru);

        $pkl->sudah_disetujui = 0;
        $pkl->save();

        return redirect('/mahasiswa/progres-pkl/' . $nim);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgresPraktikKerjaLapangan $progresPraktikKerjaLapangan)
    {
        //
    }
}
