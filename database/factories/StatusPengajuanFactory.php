<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\StatusPengajuan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StatusPengajuan>
 */
class StatusPengajuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = StatusPengajuan::class;

    public function definition(): array
    {
        return [
            'id' => (string) Str::uuid(),
            'nama_status' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
