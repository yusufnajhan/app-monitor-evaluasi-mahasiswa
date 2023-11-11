<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProvinsiSeeder::class,
            KabupatenSeeder::class,
            OperatorSeeder::class,
            DepartemenSeeder::class,
            DosenWaliSeeder::class,
            MahasiswaSeeder::class,
            IsianRencanaSemesterSeeder::class,
            KartuHasilStudiSeeder::class,
            ProgresPraktikKerjaLapanganSeeder::class,
            ProgresSkripsiSeeder::class,
        ]);
    }
}
