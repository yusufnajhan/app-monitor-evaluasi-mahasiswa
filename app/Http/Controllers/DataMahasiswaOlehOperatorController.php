<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DosenWali;
use App\Models\Mahasiswa;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreDataMahasiswaOlehOperatorRequest;
use Illuminate\Http\Request;

class DataMahasiswaOlehOperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showAllMahasiswa()
    {
        $mahasiswa = Mahasiswa::paginate(10);

        return view('operator.data-mahasiswa.show-all-mahasiswa', compact('mahasiswa'));
    }

    public function updateStatusMahasiswa(Request $request)
    {
        $nim = $request->input('nim');
        $status = $request->input('status');

        Mahasiswa::where('nim', $nim)->update(['status' => $status]);

        return response()->json(['message' => 'Status berhasil diubah!']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Mahasiswa::class)
            ? Response::allow()
            : Response::denyWithStatus(403);

        $allDosenWali = DosenWali::select('id', 'nama')->get();

        return view('operator.data-mahasiswa.create', compact('allDosenWali'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDataMahasiswaOlehOperatorRequest $request)
    {
        $this->authorize('create', Mahasiswa::class)
            ? Response::allow()
            : Response::denyWithStatus(403);

        $data = $request->validated();

        $user = User::create([
            'email' => strtolower(str_replace(' ', '.', $data['nama'])) . '@students.undip.ac.id',
            'password' => Hash::make('12345'),
            'role' => 'mahasiswa'
        ]);

        Mahasiswa::create([
            'nama' => $data['nama'],
            'nim' => $data['nim'],
            'angkatan' => $data['angkatan'],
            'status' => 'Aktif',
            'user_id' => $user->id,
            'dosen_wali_id' => $data['dosen_wali']
        ]);

        return redirect()->route('dashboard');
    }

    public function searchMahasiswa(Request $request)
    {
        $keyword = $request->input('keyword');
        $results = [];

        if ($keyword !== '') {
            $results = Mahasiswa::where('nama', 'like', '%' . $keyword . '%')
                ->orWhere('nim', 'like', '%' . $keyword . '%')
                ->get();
        } else {
            $results = '';
        }

        return response()->json(['results' => $results]);
    }

    public function searchMahasiswaForUbahStatus(Request $request)
    {
        $keyword = $request->input('keyword');
        $results = [];

        if ($keyword !== '') {
            $results = Mahasiswa::where('nama', 'like', '%' . $keyword . '%')
                ->orWhere('nim', 'like', '%' . $keyword . '%')
                ->paginate(10);
        } else {
            $results = '';
        }

        // return view('operator.data-mahasiswa.show-all-mahasiswa', compact('mahasiswa'));

        return response()->json(['results' => $results]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
