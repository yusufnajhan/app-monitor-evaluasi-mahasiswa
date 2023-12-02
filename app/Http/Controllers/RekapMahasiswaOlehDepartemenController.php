<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RekapMahasiswaOlehDepartemenController extends Controller
{
    public function mahasiswaByYearAndStatus($year, $status)
    {
        $mahasiswa = Mahasiswa::where('angkatan', $year)
            ->where('status', $status)
            ->count();

        return $mahasiswa;
    }

    public function showByYear()
    {
        return view('departemen.rekap-mahasiswa.show-by-year');
    }

    public function printPDFByYear()
    {
        $pdf = Pdf::loadView('departemen.rekap-mahasiswa.cetak-pdf-tahun');
        return $pdf->stream('rekap-mahasiswa.pdf');
    }

    public function mahasiswaByYearAndStatusShow($tahun, $status)
    {
        $mahasiswa = Mahasiswa::where('angkatan', $tahun)
            ->where('status', $status)
            ->get();

        return view(
            'departemen.rekap-mahasiswa.mahasiswa-per-tahun-dan-status',
            compact('mahasiswa', 'tahun', 'status')
        );
    }

    public function printPDFShowMahasiswa($tahun, $status)
    {
        $mahasiswa = Mahasiswa::where('angkatan', $tahun)
            ->where('status', $status)
            ->get();

        $pdf = Pdf::loadView(
            'departemen.rekap-mahasiswa.cetak-pdf-per-tahun-dan-status',
            [
                'mahasiswa' => $mahasiswa,
                'tahun' => $tahun,
                'status' => $status
            ]
        )->setPaper('a4', 'landscape');
        return $pdf->stream('rekap-mahasiswa-tahun-' . $tahun . '-status-' . $status . '.pdf');
    }
}
