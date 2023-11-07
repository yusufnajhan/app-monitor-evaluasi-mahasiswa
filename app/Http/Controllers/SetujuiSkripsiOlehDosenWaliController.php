<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\ProgresSkripsi;
use App\Http\Requests\UpdateProgresSkripsiOlehDosenWaliRequest;

class SetujuiSkripsiOlehDosenWaliController extends Controller
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

        $skripsi = ProgresSkripsi::where('mahasiswa_id', $mahasiswa->id)
            ->first();
        if (!$skripsi) {
            abort(404);
        }

        return view('dosen-wali.setujui-skripsi.show', compact('skripsi', 'nim', 'semester'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editDanSetujui($nim)
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

        return view('dosen-wali.setujui-skripsi.edit', compact('skripsi', 'nim'));
    }

    public function setujui(Request $request, $nim)
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

        if ($request->sudah_disetujui == 1) {
            $skripsi->sudah_disetujui = 1;
        } else if ($request->sudah_disetujui == 0) {
            $skripsi->sudah_disetujui = 0;
        }
        $skripsi->save();

        return redirect('/dosen-wali/progres-skripsi/' . $nim);
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateDanSetujui(UpdateProgresSkripsiOlehDosenWaliRequest $request, $nim)
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
        $skripsi->sudah_disetujui = 1;

        if ($data['status'] == 'Lulus') {
            $skripsi->nilai = $data['nilai'];
            $skripsi->tanggal_sidang = $data['tanggal_sidang'];
            $skripsi->semester_tempuh = $mahasiswa->hitungSemester();
        } else {
            $skripsi->nilai = NULL;
            $skripsi->tanggal_sidang = NULL;
            $skripsi->semester_tempuh = NULL;
        }

        $skripsi->save();

        return redirect('/dosen-wali/progres-skripsi/' . $nim);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgresSkripsi $progresPraktikKerjaLapangan)
    {
        //
    }
}
