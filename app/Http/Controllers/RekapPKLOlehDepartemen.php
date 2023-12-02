<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\ProgresPraktikKerjaLapangan;
use Database\Factories\ProgresSkripsiFactory;

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
        $pkl = ProgresPraktikKerjaLapangan::where('sudah_disetujui', 1)->count();

        // dd($pkl);

        return view('departemen.rekap-pkl.show-by-year');
    }
}
