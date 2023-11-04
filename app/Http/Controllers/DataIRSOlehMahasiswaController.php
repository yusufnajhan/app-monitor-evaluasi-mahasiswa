<?php

namespace App\Http\Controllers;

use App\Models\IsianRencanaSemester;
use App\Http\Requests\StoreIsianRencanaSemesterRequest;
use App\Http\Requests\UpdateIRSOlehMahasiswaRequest;
use App\Http\Requests\UpdateIsianRencanaSemesterRequest;
use App\Models\Mahasiswa;

class DataIRSOlehMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if (!$mahasiswa) {
            abort(404);
        }

        $irs = IsianRencanaSemester::where('mahasiswa_id', $mahasiswa->id)->get();

        return view('mahasiswa.irs.index', compact('irs', 'nim'));
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
    public function store(StoreIsianRencanaSemesterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(IsianRencanaSemester $isianRencanaSemester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nim, $semester)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if (!$mahasiswa) {
            abort(404);
        }

        $irs = IsianRencanaSemester::where('mahasiswa_id', $mahasiswa->id)
            ->where('semester', $semester)
            ->first();
        if (!$irs) {
            abort(404);
        }

        return view('mahasiswa.irs.edit', compact('irs', 'nim'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIRSOlehMahasiswaRequest $request, $nim, $semester)
    {

        // return $request->file('nama_file')->store('irs');

        $data = $request->validated();

        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if (!$mahasiswa) {
            abort(404);
        }

        $irs = IsianRencanaSemester::where('mahasiswa_id', $mahasiswa->id)
            ->where('semester', $semester)
            ->first();
        if (!$irs) {
            abort(404);
        }

        $namaFileBaru = 'irs_' . $semester . '_' . str_replace(' ', '_', strtolower($mahasiswa->nama)) . '.pdf';
        $irs->nama_file = $request->file('nama_file')->storeAs('irs', $namaFileBaru);

        $irs->sks = $data['sks'];
        $irs->save();

        return redirect('/irs/' . $nim);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IsianRencanaSemester $isianRencanaSemester)
    {
        //
    }
}
