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
}
