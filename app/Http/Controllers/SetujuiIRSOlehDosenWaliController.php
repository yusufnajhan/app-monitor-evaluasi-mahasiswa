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
    public function index()
    {
        // Mendapatkan ID dosen wali yang sedang login
        $idDosenWali = Auth::user()->dosenWali->id;

        $mahasiswa = Mahasiswa::where('dosen_wali_id', $idDosenWali)
            ->whereHas('isianRencanaSemester', function ($query) {
                $query->where(function ($q) {
                    $q->whereNull('sudah_disetujui')
                        ->orWhere('sudah_disetujui', '=', 0);
                });
            })->get();

        // dd($idDosenWali, $mahasiswa);

        return view('dosen-wali.setujui-irs.index', compact('mahasiswa'));
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
    public function show(IsianRencanaSemester $isianRencanaStudi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IsianRencanaSemester $isianRencanaStudi)
    {
        //
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
