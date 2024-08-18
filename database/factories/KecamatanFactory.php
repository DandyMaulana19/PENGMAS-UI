<?php

namespace Database\Factories;

use App\Models\Kelurahan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kecamatan>
 */
class KecamatanFactory extends Factory
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
            'namaKecamatan' => $this->faker->word,
            'namaKabupaten' => $this->faker->word,
            'namaProvinsi' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
