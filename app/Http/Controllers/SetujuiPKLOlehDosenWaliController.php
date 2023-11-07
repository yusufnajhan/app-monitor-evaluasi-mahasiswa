<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\ProgresPraktikKerjaLapangan;
use App\Http\Requests\UpdateProgresPKLOlehDosenWaliRequest;

class SetujuiPKLOlehDosenWaliController extends Controller
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

        return view('dosen-wali.setujui-pkl.show', compact('pkl', 'nim', 'semester'));
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

        $pkl = ProgresPraktikKerjaLapangan::where('mahasiswa_id', $mahasiswa->id)
            ->first();
        if (!$pkl) {
            abort(404);
        }

        return view('dosen-wali.setujui-pkl.edit', compact('pkl', 'nim'));
    }

    public function setujui(Request $request, $nim)
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

        if ($request->sudah_disetujui == 1) {
            $pkl->sudah_disetujui = 1;
        } else if ($request->sudah_disetujui == 0) {
            $pkl->sudah_disetujui = 0;
        }
        $pkl->save();

        return redirect('/dosen-wali/progres-pkl/' . $nim);
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateDanSetujui(UpdateProgresPKLOlehDosenWaliRequest $request, $nim)
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

        $pkl->status = $data['status'];
        $pkl->sudah_disetujui = 1;

        if ($data['status'] == 'Lulus') {
            $pkl->nilai = $data['nilai'];
        } else {
            $pkl->nilai = NULL;
        }

        $pkl->save();

        return redirect('/dosen-wali/progres-pkl/' . $nim);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgresPraktikKerjaLapangan $progresPraktikKerjaLapangan)
    {
        //
    }
}
