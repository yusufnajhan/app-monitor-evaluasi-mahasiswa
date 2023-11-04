<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use App\Models\KartuHasilStudi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KartuHasilStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::all()->each(function ($mahasiswa) {
            $sksKumulatif = 0;
            $ipTotal = 0;
            $totalSemester = 0;

            $irs = $mahasiswa->isianRencanaSemester;

            foreach ($irs as $irsItem) {
                $sksSemester = $irsItem->sks;
                $ipSemester = rand(25, 40) / 10;

                $sksKumulatif += $sksSemester;

                $ipTotal += $ipSemester;
                $ipKumulatif = $ipTotal / ++$totalSemester;

                $namaFile = "khs_" . strtolower(str_replace(' ', '_', $mahasiswa->nama)) . "_{$irsItem->semester}.pdf";

                KartuHasilStudi::create([
                    'semester' => $irsItem->semester,
                    'sks_semester' => $sksSemester,
                    'sks_kumulatif' => $sksKumulatif,
                    'ip_semester' => $ipSemester,
                    'ip_kumulatif' => $ipKumulatif,
                    'nama_file' => $namaFile,
                    'sudah_disetujui' => rand(0, 1),
                    'mahasiswa_id' => $mahasiswa->id
                ]);
            }
        });
    }
}
