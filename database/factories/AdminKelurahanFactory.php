<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Kelurahan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminKelurahan>
 */
class AdminKelurahanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'kelurahan_id' => Kelurahan::factory(),
        ];
    }
}
