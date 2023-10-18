<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operator>
 */
class OperatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create([
            'email' => 'sepuh@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'operator'
        ]);

        return [
            'nip' => '1195671929239',
            'nama' => 'Sepuh',
            'user_id' => $user->id
        ];
    }
}
