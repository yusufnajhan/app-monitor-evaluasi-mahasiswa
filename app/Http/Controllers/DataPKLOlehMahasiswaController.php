<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\ProgresPraktikKerjaLapangan;
use App\Http\Requests\StoreProgresPraktikKerjaLapanganRequest;
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
    public function store(StoreProgresPraktikKerjaLapanganRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($nim)
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

        return view('mahasiswa.pkl.show', compact('pkl', 'nim'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgresPraktikKerjaLapangan $progresPraktikKerjaLapangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgresPraktikKerjaLapanganRequest $request, ProgresPraktikKerjaLapangan $progresPraktikKerjaLapangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgresPraktikKerjaLapangan $progresPraktikKerjaLapangan)
    {
        //
    }
}
