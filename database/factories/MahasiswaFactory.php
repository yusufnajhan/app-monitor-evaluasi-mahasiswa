<?php

namespace Database\Factories;

use App\Models\User;
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

        return [
            'nim' => $nim,
            'nama' => $this->faker->name(),
            'angkatan' => $this->faker->numberBetween(2017, 2023),
            'status' => 'Aktif'
        ];
    }
}
