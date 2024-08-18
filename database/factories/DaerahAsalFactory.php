<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DataDiri;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DaerahAsal>
 */
class DaerahAsalFactory extends Factory
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
            'alamat' => $this->faker->streetAddress,
            'namaProvinsi' => $this->faker->state,
            'namaKabupaten' => $this->faker->city,
            'namaKecamatan' => $this->faker->citySuffix,
            'namaKelurahan' => $this->faker->streetName,
            'namaRw' => 'RW ' . $this->faker->numberBetween(1, 10),
            'namaRt' => 'RT ' . $this->faker->numberBetween(1, 20),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
