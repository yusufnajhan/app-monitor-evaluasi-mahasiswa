<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswaData = Mahasiswa::all();
        foreach ($mahasiswaData as $mahasiswa) {
            User::create([
                'email' => $mahasiswa->email,
                'password' => $mahasiswa->password,
                'role' => 'mahasiswa'
            ]);
        }
    }
}
