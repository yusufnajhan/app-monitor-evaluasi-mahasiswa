<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Operator;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operatorData = Operator::all();
        foreach ($operatorData as $operator) {
            User::create([
                'email' => $operator->email,
                'password' => $operator->password,
                'role' => 'operator'
            ]);
        }

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
