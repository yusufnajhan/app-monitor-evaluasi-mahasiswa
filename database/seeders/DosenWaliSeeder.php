<?php

namespace Database\Seeders;

use App\Models\DosenWali;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenWaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DosenWali::factory()->count(5)->create();
    }
}
