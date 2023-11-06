<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\ProgresSkripsi;
use App\Http\Requests\StoreProgresSkripsiRequest;
use App\Http\Requests\UpdateProgresSkripsiOlehMahasiswaRequest;
use App\Http\Requests\UpdateProgresSkripsiRequest;

class DataSkripsiOlehMahasiswaController extends Controller
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
    public function store(StoreProgresSkripsiRequest $request)
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

        $skripsi = ProgresSkripsi::where('mahasiswa_id', $mahasiswa->id)
            ->first();
        if (!$skripsi) {
            abort(404);
        }

        return view('mahasiswa.skripsi.show', compact('skripsi', 'nim'));
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

        $skripsi = ProgresSkripsi::where('mahasiswa_id', $mahasiswa->id)
            ->first();
        if (!$skripsi) {
            abort(404);
        }

        return view('mahasiswa.skripsi.edit', compact('skripsi', 'nim'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgresSkripsiOlehMahasiswaRequest $request, $nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if (!$mahasiswa) {
            abort(404);
        }

        $skripsi = ProgresSkripsi::where('mahasiswa_id', $mahasiswa->id)
            ->first();
        if (!$skripsi) {
            abort(404);
        }

        $data = $request->validated();

        $skripsi->status = $data['status'];
        $skripsi->sudah_disetujui = 0;

        if ($data['status'] == 'Lulus') {
            $skripsi->nilai = $data['nilai'];

            $namaFileBaru = 'skripsi_' . str_replace(' ', '_', strtolower($mahasiswa->nama)) . '.pdf';
            $skripsi->nama_file = $request->file('nama_file')->storeAs('progres-skripsi', $namaFileBaru);

            $skripsi->tanggal_sidang = $data['tanggal_sidang'];
            $skripsi->semester_tempuh = $mahasiswa->hitungSemester();
        } else {
            $skripsi->nilai = NULL;
            $skripsi->nama_file = NULL;
            $skripsi->tanggal_sidang = NULL;
            $skripsi->semester_tempuh = NULL;
        }

        $skripsi->save();

        return redirect('/progres-skripsi/' . $nim);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgresSkripsi $progresSkripsi)
    {
        //
    }
}
