<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DosenWali>
 */
class DosenWaliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nip = '';
        for ($i = 0; $i < 14; $i++) {
            $nip .= $this->faker->randomDigit;
        }

        $user = User::factory()->create([
            'email' => $this->faker->freeEmail(),
            'password' => bcrypt('12345'),
            'role' => 'dosenWali'
        ]);

        $nama = $this->faker->name();

        return [
            'nip' => $nip,
            'nama' => $nama,
            'user_id' => $user->id,
            'foto_profil' => "fp_" . strtolower(str_replace(' ', '_', $nama)) . ".jpg"
        ];
    }
}
