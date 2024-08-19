<?php

namespace Database\Factories;

use App\Models\StatusPekerjaan;
use App\Models\StatusPengajuan;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataDiri>
 */
class DataDiriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'nik' => $this->faker->unique()->numerify('#################'),
            'namaLengkap' => $this->faker->name(),
            'jenisKelamin' => $this->faker->numberBetween(0, 1), // 0 untuk pria, 1 untuk wanita (atau sebaliknya)
            'tempatLahir' => $this->faker->city(),
            'tanggalLahir' => $this->faker->date(),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu']),
            'pendidikan' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
            'namaPekerjaan' => $this->faker->jobTitle(),
            'alamatPekerjaan' => $this->faker->address(),
            'urlKTP' => $this->faker->imageUrl(),
            'urlKK' => $this->faker->imageUrl(),
            'urlBukuNikah' => $this->faker->imageUrl(),
            'id_status_pekerjaan' => StatusPekerjaan::factory(),
            'id_status_pengajuan' => StatusPengajuan::factory(),
            'id_user' => User::factory(),
        ];
    }
}
