<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\ProgresPraktikKerjaLapangan;
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
                ProgresPraktikKerjaLapangan::create([
                    'mahasiswa_id' => $mahasiswa->id
                ]);
            } else {
                $namaFile = "pkl_" . strtolower(str_replace(' ', '_', $mahasiswa->nama)) . ".pdf";

                ProgresPraktikKerjaLapangan::create([
                    'semester' => $semester,
                    'nilai' => rand(71, 100),
                    'nama_file' => $namaFile,
                    'sudah_disetujui' => rand(0, 1),
                    'mahasiswa_id' => $mahasiswa->id
                ]);
            }
        });
    }
}
