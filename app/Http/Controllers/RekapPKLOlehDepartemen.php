<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\ProgresPraktikKerjaLapangan;
use Database\Factories\ProgresSkripsiFactory;
use Laravel\Ui\Presets\React;

class RekapPKLOlehDepartemen extends Controller
{
    public function sudahPKL($year)
    {
        $pkl = ProgresPraktikKerjaLapangan::whereHas('mahasiswa', function ($query) use ($year) {
            $query->where('angkatan', $year);
        })
            ->where('sudah_disetujui', 1)
            ->count();

        return $pkl;
    }

    public function belumPKL($year)
    {
        $pkl = ProgresPraktikKerjaLapangan::whereHas('mahasiswa', function ($query) use ($year) {
            $query->where('angkatan', $year);
        })
            ->where(function ($query) {
                $query->whereNull('nilai')
                    ->orWhere('sudah_disetujui', 0);
            })
            ->count();

        return $pkl;
    }


    public function showByYear()
    {
        return view('departemen.rekap-pkl.show-by-year');
    }

    public function daftarMahasiswaSudahPKL($tahun)
    {
        // $mahasiswa = Mahasiswa::whereHas('progresPraktikKerjaLapangan', function ($query) {
        //     $query->where('sudah_disetujui', 1);
        // })
        //     ->where('angkatan', $request)
        //     ->get();

        $mahasiswa = Mahasiswa::whereHas('progresPraktikKerjaLapangan', function ($query) {
            $query->where('sudah_disetujui', 1);
        })
            ->where('angkatan', $tahun)
            ->get();

        return view('departemen.rekap-pkl.mahasiswa-sudah-pkl', compact('mahasiswa', 'tahun'));
        // dd($tahun);
    }
}
