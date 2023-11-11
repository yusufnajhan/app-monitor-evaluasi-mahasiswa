<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use App\Models\ProgresSkripsi;

class ProgresSkripsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::all()->each(function ($mahasiswa) {
            $semester = $mahasiswa->hitungSemester();

            if ($semester < 7) {
                ProgresSkripsi::create([
                    'mahasiswa_id' => $mahasiswa->id
                ]);
            } else {
                $namaFile = "skripsi_" . strtolower(str_replace(' ', '_', $mahasiswa->nama)) . ".pdf";
                $tanggalSidang = now();

                ProgresSkripsi::create([
                    'semester' => $semester,
                    'nilai' => rand(71, 100),
                    'nama_file' => $namaFile,
                    'tanggal_sidang' => $tanggalSidang,
                    'sudah_disetujui' => rand(0, 1),
                    'mahasiswa_id' => $mahasiswa->id
                ]);
            }
        });
    }
}
