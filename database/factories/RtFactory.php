<?php

namespace Database\Factories;

use App\Models\RW;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rt>
 */
class RtFactory extends Factory
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
            'nama' => $this->faker->word,
            'rw_id' => RW::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
