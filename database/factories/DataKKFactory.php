<?php

namespace Database\Factories;

use App\Models\RT;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataKK>
 */
class DataKKFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => (string) Str::uuid(),
            'alamat' => $this->faker->word,
            'no_kk' => $this->faker->word,
            'rt_id' => RT::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
