<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateKHSOlehMahasiswaRequest;
use App\Models\KartuHasilStudi;
use App\Models\Mahasiswa;

class DataKHSOlehMahasiswaController extends Controller
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

        $khs = KartuHasilStudi::where('mahasiswa_id', $mahasiswa->id)->get();

        return view('mahasiswa.khs.index', compact('khs', 'nim'));
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
    public function store($request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($nim, $semester)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if (!$mahasiswa) {
            abort(404);
        }

        $khs = KartuHasilStudi::where('mahasiswa_id', $mahasiswa->id)
            ->where('semester', $semester)
            ->first();
        if (!$khs) {
            abort(404);
        }

        return view('mahasiswa.khs.show', compact('khs', 'nim'));
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

        $khs = KartuHasilStudi::where('mahasiswa_id', $mahasiswa->id)
            ->where('semester', $semester)
            ->first();
        if (!$khs) {
            abort(404);
        }

        return view('mahasiswa.khs.edit', compact('khs', 'nim'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKHSOlehMahasiswaRequest $request, $nim, $semester)
    {
        $data = $request->validated();

        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if (!$mahasiswa) {
            abort(404);
        }

        $khs = KartuHasilStudi::where('mahasiswa_id', $mahasiswa->id)
            ->where('semester', $semester)
            ->first();
        if (!$khs) {
            abort(404);
        }

        $namaFileBaru = 'khs_' . $semester . '_' . str_replace(' ', '_', strtolower($mahasiswa->nama)) . '.pdf';
        $khs->nama_file = $request->file('nama_file')->storeAs('khs', $namaFileBaru);

        $khs->sks_semester = $data['sks_semester'];
        $khs->sks_kumulatif = $data['sks_kumulatif'];
        $khs->ip_semester = $data['ip_semester'];
        $khs->ip_kumulatif = $data['ip_kumulatif'];
        $khs->sudah_disetujui = 0;
        $khs->save();

        return redirect('/mahasiswa/khs/' . $nim);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($isianRencanaSemester)
    {
        //
    }
}
