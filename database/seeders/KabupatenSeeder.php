<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = 'tb_kabs.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Tabel kabupaten berhasil di-seeding');
    }
}
