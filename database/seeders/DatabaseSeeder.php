<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DosenWali;
use App\Models\Mahasiswa;
use App\Models\Departemen;
use Illuminate\Database\Seeder;
use Database\Seeders\OperatorSeeder;
use Database\Seeders\DosenWaliSeeder;
use Database\Seeders\MahasiswaSeeder;
use Database\Seeders\DepartemenSeeder;
use Database\Seeders\IsianRencanaSemesterSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            OperatorSeeder::class,
            DepartemenSeeder::class,
            DosenWaliSeeder::class,
            MahasiswaSeeder::class,
            IsianRencanaSemesterSeeder::class
        ]);
    }
}
