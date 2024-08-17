<?php

namespace Database\Factories;

use App\Models\DataDiri;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DaerahTujuan>
 */
class DaerahTujuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dataDiri_id' => DataDiri::factory(),
            'alamat' => $this->faker->word,
            'namaProvinsi' => $this->faker->word,
            'namaKabupaten' => $this->faker->word,
            'namaKecamatan' => $this->faker->word,
            'namaKelurahan' => $this->faker->word,
            'namaRw' => $this->faker->word,
            'namaRt' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
