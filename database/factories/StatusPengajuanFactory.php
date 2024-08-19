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
            'nama_status' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function rt(): StatusPengajuanFactory
    {
        return $this->state([
            'nama_status' => 'RT',
        ]);
    }

    public function rw(): StatusPengajuanFactory
    {
        return $this->state([
            'nama_status' => 'RW',
        ]);
    }

    public function kelurahan(): StatusPengajuanFactory
    {
        return $this->state([
            'nama_status' => 'Kelurahan',
        ]);
    }

    public function kecamatan(): StatusPengajuanFactory
    {
        return $this->state([
            'nama_status' => 'Kecamatan',
        ]);
    }
}
