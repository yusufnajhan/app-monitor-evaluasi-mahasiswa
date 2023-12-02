<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Mahasiswa;
use App\Models\ProgresSkripsi;

class RekapSkripsiOlehDepartemen extends Controller
{
    public function sudahSkripsi($year)
    {
        $skripsi = ProgresSkripsi::whereHas('mahasiswa', function ($query) use ($year) {
            $query->where('angkatan', $year);
        })
            ->where('sudah_disetujui', 1)
            ->count();

        return $skripsi;
    }

    public function belumSkripsi($year)
    {
        $skripsi = ProgresSkripsi::whereHas('mahasiswa', function ($query) use ($year) {
            $query->where('angkatan', $year);
        })
            ->where(function ($query) {
                $query->whereNull('nilai')
                    ->orWhere('sudah_disetujui', 0);
            })
            ->count();

        return $skripsi;
    }


    public function showByYear()
    {
        return view('departemen.rekap-skripsi.show-by-year');
    }

    public function printPDFByYear()
    {
        $pdf = Pdf::loadView('departemen.rekap-skripsi.cetak-pdf-tahun')->setPaper('a4', 'landscape');
        return $pdf->stream('skripsi-per-tahun.pdf');
    }

    public function daftarMahasiswaSudahSkripsi($tahun)
    {
        $mahasiswa = Mahasiswa::whereHas('progresSkripsi', function ($query) {
            $query->where('sudah_disetujui', 1);
        })
            ->where('angkatan', $tahun)
            ->get();

        return view('departemen.rekap-skripsi.mahasiswa-sudah-skripsi', compact('mahasiswa', 'tahun'));
    }

    public function printPDFSudahSkripsi($tahun)
    {
        $mahasiswa = Mahasiswa::whereHas('progresSkripsi', function ($query) {
            $query->where('sudah_disetujui', 1);
        })
            ->where('angkatan', $tahun)
            ->get();

        $pdf = Pdf::loadView('departemen.rekap-skripsi.cetak-pdf-sudah-skripsi', [
            'mahasiswa' => $mahasiswa,
            'tahun' => $tahun
        ]);
        return $pdf->stream('sudah-skripsi-tahun-' . $tahun . '.pdf');
        // return view('departemen.rekap-pkl.cetak-pdf-sudah-pkl', compact('mahasiswa', 'tahun'));
    }

    public function daftarMahasiswaBelumSkripsi($tahun)
    {
        $mahasiswa = Mahasiswa::whereHas('progresSkripsi', function ($query) {
            $query->whereNull('semester')
                ->orWhere('sudah_disetujui', 0);
        })
            ->where('angkatan', $tahun)
            ->get();

        return view('departemen.rekap-skripsi.mahasiswa-belum-skripsi', compact('mahasiswa', 'tahun'));
    }

    public function printPDFBelumSkripsi($tahun)
    {
        $mahasiswa = Mahasiswa::whereHas('progresSkripsi', function ($query) {
            $query->whereNull('semester')
                ->orWhere('sudah_disetujui', 0);
        })
            ->where('angkatan', $tahun)
            ->get();

        $pdf = Pdf::loadView('departemen.rekap-skripsi.cetak-pdf-belum-skripsi', [
            'mahasiswa' => $mahasiswa,
            'tahun' => $tahun
        ]);

        return $pdf->stream('belum-skripsi-tahun-' . $tahun . '.pdf');
    }
}
