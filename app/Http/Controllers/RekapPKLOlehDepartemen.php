<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
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
        return view('departemen.rekap-pkl.show-by-year');
    }

    public function printPDFByYear()
    {
        $pdf = Pdf::loadView('departemen.rekap-pkl.cetak-pdf-tahun')->setPaper('a4', 'landscape');
        return $pdf->stream('pkl-per-tahun.pdf');
    }

    public function daftarMahasiswaSudahPKL($tahun)
    {
        $mahasiswa = Mahasiswa::whereHas('progresPraktikKerjaLapangan', function ($query) {
            $query->where('sudah_disetujui', 1);
        })
            ->where('angkatan', $tahun)
            ->get();

        return view('departemen.rekap-pkl.mahasiswa-sudah-pkl', compact('mahasiswa', 'tahun'));
    }

    public function printPDFSudahPKL($tahun)
    {
        $mahasiswa = Mahasiswa::whereHas('progresPraktikKerjaLapangan', function ($query) {
            $query->where('sudah_disetujui', 1);
        })
            ->where('angkatan', $tahun)
            ->get();

        $pdf = Pdf::loadView('departemen.rekap-pkl.cetak-pdf-sudah-pkl', [
            'mahasiswa' => $mahasiswa,
            'tahun' => $tahun
        ]);
        return $pdf->stream('sudah-pkl-tahun-' . $tahun . '.pdf');
        // return view('departemen.rekap-pkl.cetak-pdf-sudah-pkl', compact('mahasiswa', 'tahun'));
    }

    public function daftarMahasiswaBelumPKL($tahun)
    {
        $mahasiswa = Mahasiswa::whereHas('progresPraktikKerjaLapangan', function ($query) {
            $query->whereNull('semester')
                ->orWhere('sudah_disetujui', 0);
        })
            ->where('angkatan', $tahun)
            ->get();

        return view('departemen.rekap-pkl.mahasiswa-belum-pkl', compact('mahasiswa', 'tahun'));
    }

    public function printPDFBelumPKL($tahun)
    {
        $mahasiswa = Mahasiswa::whereHas('progresPraktikKerjaLapangan', function ($query) {
            $query->whereNull('semester')
                ->orWhere('sudah_disetujui', 0);
        })
            ->where('angkatan', $tahun)
            ->get();

        $pdf = Pdf::loadView('departemen.rekap-pkl.cetak-pdf-belum-pkl', [
            'mahasiswa' => $mahasiswa,
            'tahun' => $tahun
        ]);
        return $pdf->stream('belum-pkl-tahun-' . $tahun . '.pdf');
        // return view('departemen.rekap-pkl.cetak-pdf-sudah-pkl', compact('mahasiswa', 'tahun'));
    }
}
