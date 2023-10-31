<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departemen>
 */
class DepartemenFactory extends Factory
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
            'role' => 'departemen'
        ]);

        return [
            'nip' => $nip,
            'nama' => $this->faker->name(),
            'user_id' => $user->id
        ];
    }
}
