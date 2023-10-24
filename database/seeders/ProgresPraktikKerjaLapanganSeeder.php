<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\ProgresPraktikKerjaLapangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgresPraktikKerjaLapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::all()->each(function ($mahasiswa) {
            $semester = $mahasiswa->hitungSemester();
            $status = NULL;

            if ($semester < 6) {
                $status = 'Belum Ambil';
            } else {
                $arrayStatus = ['Sedang Ambil', 'Lulus'];
                $statusTerpilih = array_rand($arrayStatus, 1);
                $status = $arrayStatus[$statusTerpilih];
            }

            $nilai = NULL;
            $namaFile = NULL;
            if ($status == 'Lulus') {
                $arrayNilai = ['A', 'B'];
                $nilaiTerpilih = array_rand($arrayNilai);
                $nilai = $arrayNilai[$nilaiTerpilih];
                $namaFile = "pkl_" . strtolower(str_replace(' ', '_', $mahasiswa->nama)) . ".pdf";
            }

            ProgresPraktikKerjaLapangan::create([
                'status' => $status,
                'nilai' => $nilai,
                'nama_file' => $namaFile,
                'mahasiswa_id' => $mahasiswa->id
            ]);
        });
    }
}
