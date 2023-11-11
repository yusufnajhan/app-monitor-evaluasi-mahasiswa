<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = 'tb_provs.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Tabel provinsi berhasil di-seeding');
    }
}
