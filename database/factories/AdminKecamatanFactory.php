<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Kecamatan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminKecamatan>
 */
class AdminKecamatanFactory extends Factory
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
            'kecamatan_id' => Kecamatan::factory(),
        ];
    }
}
