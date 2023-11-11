<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nim = '';
        for ($i = 0; $i < 14; $i++) {
            $nim .= $this->faker->randomDigit;
        }

        $user = User::factory()->create([
            'email' => $this->faker->freeEmail(),
            'password' => bcrypt('12345'),
            'role' => 'mahasiswa'
        ]);

        $kota = $this->faker->city();
        $provinsi = $this->faker->state();

        // Dapatkan kode kota dan provinsi jika sesuai dari database
        $kodeKota = Kabupaten::where('nama_kab', 'like', '%' . $kota . '%')->value('kode_kab');
        $kodeProvinsi = Provinsi::where('nama_prov', 'like', '%' . $provinsi . '%')->value('kode_prov');

        // Jika tidak sesuai, gunakan nilai default
        if (!$kodeKota) {
            $kodeKota = '9999';
        }
        if (!$kodeProvinsi) {
            $kodeProvinsi = '99';
        }

        return [
            'nim' => $nim,
            'nama' => $this->faker->name(),
            'angkatan' => $this->faker->numberBetween(2017, 2023),
            'status' => 'Aktif',
            'jalur_masuk' => $this->faker->randomElement(['SNMPTN', 'SBMPTN', 'Mandiri']),
            'no_telepon' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'kota' => $kodeKota,
            'provinsi' => $kodeProvinsi,
            'user_id' => $user->id,
            'dosen_wali_id' => $this->faker->numberBetween([1, 5])
        ];
    }
}
