<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\IsianRencanaSemester;
use Illuminate\Support\Facades\Auth;

class SetujuiIRSOlehDosenWaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexMahasiswa()
    {
        // Mendapatkan ID dosen wali yang sedang login
        $idDosenWali = Auth::user()->dosenWali->id;

        // $mahasiswa = Mahasiswa::where('dosen_wali_id', $idDosenWali)
        //     ->whereHas('isianRencanaSemester', function ($query) {
        //         $query->where(function ($q) {
        //             $q->whereNull('sudah_disetujui')
        //                 ->orWhere('sudah_disetujui', '=', 0);
        //         });
        //     })->get();
        $mahasiswa = Mahasiswa::where('dosen_wali_id', $idDosenWali)
            ->whereHas('isianRencanaSemester', function ($query) {
                $query->where(function ($q) {
                    $q->where('sudah_disetujui', '=', 0);
                });
            })->get();

        return view('dosen-wali.setujui-irs.index-mahasiswa', compact('mahasiswa'));
    }

    public function indexIRS($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        // $irs = IsianRencanaSemester::where('mahasiswa_id', $mahasiswa->id)
        //     ->where(function ($query) {
        //         $query->where('sudah_disetujui', 0)->orWhereNull('sudah_disetujui');
        //     })
        //     ->get();
        $irs = IsianRencanaSemester::where('mahasiswa_id', $mahasiswa->id)
            ->where(function ($query) {
                $query->where('sudah_disetujui', 0);
            })
            ->get();

        return view('dosen-wali.setujui-irs.index-irs', compact('mahasiswa', 'irs'));
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
    public function show($nim, $semester)
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

        return view('dosen-wali.setujui-irs.edit', compact('mahasiswa', 'irs'));
    }

    public function setujui(Request $request, $nim, $semester)
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

        if ($request->sudah_disetujui == 1) {
            $irs->sudah_disetujui = 1;
        } else if ($request->sudah_disetujui == 0) {
            $irs->sudah_disetujui = 0;
        }

        $irs->save();
        return redirect('dosen-wali/irs/' . $nim);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IsianRencanaSemester $isianRencanaStudi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IsianRencanaSemester $isianRencanaStudi)
    {
        //
    }
}
