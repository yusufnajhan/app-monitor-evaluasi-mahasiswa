<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use App\Models\IsianRencanaSemester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IsianRencanaSemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::all()->each(function ($mahasiswa) {
            $semester = $mahasiswa->hitungSemester();

            for ($i = 1; $i <= $semester; $i++) {
                $namaFile = "file_" . strtolower(str_replace(' ', '_', $mahasiswa->nama)) . "_{$i}.pdf";

                IsianRencanaSemester::create([
                    'semester' => $i,
                    'sks' => rand(18, 24),
                    'nama_file' => $namaFile,
                    'mahasiswa_id' => $mahasiswa->id
                ]);
            }
        });
    }
}
