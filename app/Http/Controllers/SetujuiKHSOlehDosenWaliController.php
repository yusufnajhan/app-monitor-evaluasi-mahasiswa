<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\KartuHasilStudi;
use App\Http\Requests\UpdateKHSOlehDosenWaliRequest;

class SetujuiKHSOlehDosenWaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function indexMahasiswa()
    // {
    //     // Mendapatkan ID dosen wali yang sedang login
    //     $idDosenWali = Auth::user()->dosenWali->id;

    //     // $mahasiswa = Mahasiswa::where('dosen_wali_id', $idDosenWali)
    //     //     ->whereHas('isianRencanaSemester', function ($query) {
    //     //         $query->where(function ($q) {
    //     //             $q->whereNull('sudah_disetujui')
    //     //                 ->orWhere('sudah_disetujui', '=', 0);
    //     //         });
    //     //     })->get();
    //     $mahasiswa = Mahasiswa::where('dosen_wali_id', $idDosenWali)
    //         ->whereHas('isianRencanaSemester', function ($query) {
    //             $query->where(function ($q) {
    //                 $q->where('sudah_disetujui', '=', 0);
    //             });
    //         })->get();

    //     return view('dosen-wali.setujui-khs.index-mahasiswa', compact('mahasiswa'));
    // }

    public function index($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        // $irs = IsianRencanaSemester::where('mahasiswa_id', $mahasiswa->id)
        //     ->where(function ($query) {
        //         $query->where('sudah_disetujui', 0);
        //     })
        //     ->get();
        $khs = KartuHasilStudi::where('mahasiswa_id', $mahasiswa->id)
            ->get();

        return view('dosen-wali.setujui-khs.index', compact('mahasiswa', 'khs'));
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

        $khs = KartuHasilStudi::where('mahasiswa_id', $mahasiswa->id)
            ->where('semester', $semester)
            ->first();
        if (!$khs) {
            abort(404);
        }

        return view('dosen-wali.setujui-khs.edit', compact('mahasiswa', 'khs'));
    }

    public function editDanSetujui($nim, $semester)
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

        return view('dosen-wali.setujui-khs.edit-dan-setujui', compact('mahasiswa', 'khs'));
    }

    public function setujui(Request $request, $nim, $semester)
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

        if ($request->sudah_disetujui == 1) {
            $khs->sudah_disetujui = 1;
        } else if ($request->sudah_disetujui == 0) {
            $khs->sudah_disetujui = 0;
        }

        $khs->save();
        return redirect('dosen-wali/khs/' . $nim);
    }

    public function updateDanSetujui(UpdateKHSOlehDosenWaliRequest $request, $nim, $semester)
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

        $data = $request->validated();

        $khs->sks_semester = $data['sks_semester'];
        $khs->sks_kumulatif = $data['sks_kumulatif'];
        $khs->ip_semester = $data['ip_semester'];
        $khs->ip_kumulatif = $data['ip_kumulatif'];
        $khs->sudah_disetujui = 1;

        $khs->save();
        return redirect('dosen-wali/khs/' . $nim);
    }
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, IsianRencanaSemester $isianRencanaStudi)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(IsianRencanaSemester $isianRencanaStudi)
    // {
    //     //
    // }
}
