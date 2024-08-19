<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\RW;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminRw>
 */
class AdminRwFactory extends Factory
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
            'rw_id' => RW::factory(),
        ];
    }
}
