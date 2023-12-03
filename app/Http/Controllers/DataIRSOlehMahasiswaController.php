<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\IsianRencanaSemester;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;
use App\Http\Requests\StoreIRSOlehMahasiswaRequest;
use App\Http\Requests\UpdateIRSOlehMahasiswaRequest;


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

        $irs = IsianRencanaSemester::whereIn('mahasiswa_id', [$mahasiswa->id])->get();

        $this->authorize('viewAny', IsianRencanaSemester::class);

        return view('mahasiswa.irs.index', compact('irs', 'nim'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', IsianRencanaSemester::class)
            ? Response::allow()
            : Response::denyWithStatus(404);

        $mahasiswa = Mahasiswa::where('nim', auth()->user()->mahasiswa->nim)
            ->first();
        if (!$mahasiswa) {
            abort(404);
        }

        return view('mahasiswa.irs.create', compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIRSOlehMahasiswaRequest $request)
    {
        $this->authorize('create', IsianRencanaSemester::class)
            ? Response::allow()
            : Response::denyWithStatus(404);

        $data = $request->validated();

        $mahasiswa = Mahasiswa::where('nim', auth()->user()->mahasiswa->nim)
            ->first();
        if (!$mahasiswa) {
            abort(404);
        }

        $irs = IsianRencanaSemester::firstOrNew(
            ['mahasiswa_id' => $mahasiswa->id, 'semester' => $data['semester']],
            ['sks' => $data['sks'], 'sudah_disetujui' => 0]
        );

        if ($irs->sudah_disetujui == 1) {
            return redirect('/mahasiswa/irs/' . $mahasiswa->nim)->with('error', 'IRS sudah disetujui, tidak dapat disimpan');
        }

        if ($request->hasFile('nama_file')) {
            $namaFileBaru = 'irs_' . $data['semester'] . '_' . str_replace(' ', '_', strtolower($mahasiswa->nama)) . '.pdf';
            $irs->nama_file = $request->file('nama_file')->storeAs('irs', $namaFileBaru);
        }

        // Set values for existing or new IRS
        $irs->sks = $data['sks'];
        $irs->sudah_disetujui = 0;

        $irs->save();

        return redirect('/mahasiswa/irs/' . $mahasiswa->nim);
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

        $irs = IsianRencanaSemester::where('mahasiswa_id', $mahasiswa->id)
            ->where('semester', $semester)
            ->first();
        if (!$irs) {
            abort(404);
        }

        $this->authorize('view', $irs);

        return view('mahasiswa.irs.show', compact('irs', 'nim'));
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

        $this->authorize('update', $irs);

        if ($irs->sudah_disetujui == 1) {
            return redirect('/mahasiswa/irs/' . $mahasiswa->nim)->with('error', 'IRS sudah disetujui, tidak bisa diubah');
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

        $this->authorize('update', $irs);

        if ($irs->sudah_disetujui == 1) {
            return redirect('/mahasiswa/irs/' . $mahasiswa->nim)->with('error', 'IRS sudah disetujui, tidak dapat disimpan');
        }

        $namaFileBaru = 'irs_' . $semester . '_' . str_replace(' ', '_', strtolower($mahasiswa->nama)) . '.pdf';
        $irs->nama_file = $request->file('nama_file')->storeAs('irs', $namaFileBaru);

        $irs->sks = $data['sks'];
        $irs->sudah_disetujui = 0;
        $irs->save();

        return redirect('/mahasiswa/irs/' . $nim);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IsianRencanaSemester $isianRencanaSemester)
    {
        //
    }
}
