<?php

namespace Database\Factories;

use App\Models\DataDiri;
use App\Models\DataKK;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataDiriDataKK>
 */
class DataDiriDataKKFactory extends Factory
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
            'dataKk_id' => DataKK::factory(),
        ];
    }
}
