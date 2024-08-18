<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
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
            'name' => 'Warga',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Assign specific role names.
     */
    public function adminRT(): Factory
    {
        return $this->state(fn(array $attributes) => ['name' => 'AdminRT']);
    }

    public function adminRW(): Factory
    {
        return $this->state(fn(array $attributes) => ['name' => 'AdminRW']);
    }

    public function adminKelurahan(): Factory
    {
        return $this->state(fn(array $attributes) => ['name' => 'AdminKelurahan']);
    }

    public function adminKecamatan(): Factory
    {
        return $this->state(fn(array $attributes) => ['name' => 'AdminKecamatan']);
    }
}
