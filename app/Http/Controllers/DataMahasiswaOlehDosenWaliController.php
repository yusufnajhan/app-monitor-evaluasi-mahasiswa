<?php

namespace App\Http\Controllers;

use App\Models\IsianRencanaSemester;
use App\Models\KartuHasilStudi;
use App\Models\Mahasiswa;
use App\Models\ProgresPraktikKerjaLapangan;
use App\Models\ProgresSkripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataMahasiswaOlehDosenWaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idDosenWali = Auth::user()->dosenWali->id;

        $mahasiswa = Mahasiswa::where('dosen_wali_id', $idDosenWali)
            ->get();

        return view('dosen-wali.lihat-mahasiswa.index', compact('mahasiswa'));
    }

    public function searchMahasiswa(Request $request)
    {
        $keyword = $request->input('keyword');
        $results = [];

        if ($keyword !== '') {
            $idDosenWali = Auth::user()->dosenWali->id;

            $results = Mahasiswa::where('nama', 'like', '%' . $keyword . '%')
                ->where('dosen_wali_id', $idDosenWali)
                ->get();
        } else {
            $results = '';
        }

        return response()->json(['results' => $results]);
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
    public function show($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        $irs = IsianRencanaSemester::where('mahasiswa_id', $mahasiswa->id)->get();
        $khs = KartuHasilStudi::where('mahasiswa_id', $mahasiswa->id)->get();
        $pkl = ProgresPraktikKerjaLapangan::where('mahasiswa_id', $mahasiswa->id)->first();
        $skripsi = ProgresSkripsi::where('mahasiswa_id', $mahasiswa->id)->first();

        // dd($irs, $khs, $pkl, $skripsi);
        return view('dosen-wali.lihat-mahasiswa.show', compact('mahasiswa', 'irs', 'khs', 'pkl', 'skripsi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
