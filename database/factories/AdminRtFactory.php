<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\RT;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminRt>
 */
class AdminRtFactory extends Factory
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
            'rt_id' => RT::factory(),
        ];
    }
}
