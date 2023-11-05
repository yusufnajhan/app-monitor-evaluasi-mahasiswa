<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\ProgresSkripsi;
// use App\Http\Requests\StoreProgresSkripsiRequest;
// use App\Http\Requests\UpdateProgresPraktikKerjaLapanganRequest;

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
    public function update(Request $request, $nim)
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

        $request->validate([
            'status' => 'required'
        ]);
        $skripsi->status = $request->input('status');

        if ($request->status == 'Lulus') {
            $request->validate([
                'nilai' => 'required',
                'nama_file' => 'required|file|mimes:pdf'
            ]);

            $skripsi->nilai = $request->input('nilai');

            $namaFileBaru = 'skripsi_' . str_replace(' ', '_', strtolower($mahasiswa->nama)) . '.pdf';
            $skripsi->nama_file = $request->file('nama_file')->storeAs('progres-pkl', $namaFileBaru);
        } else {
            $skripsi->nilai = NULL;
            $skripsi->nama_file = NULL;
        }

        $skripsi->save();

        return redirect('/progres-pkl/' . $nim);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($progresPraktikKerjaLapangan)
    {
        //
    }
}
