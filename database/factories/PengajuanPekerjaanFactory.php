<?php

namespace Database\Factories;

use App\Models\DataDiri;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\StatusPekerjaan;
use App\Models\StatusPengajuan;
use App\Models\User;

class PengajuanPekerjaanFactory extends Factory
{
    protected $model = DataDiri::class;

    public function definition(): array
    {
        return [
            'id' => (string) Str::uuid(),
            'nik' => $this->faker->numberBetween(1000000000000000, 9999999999999999),
            'namaLengkap' => $this->faker->name,
            'jenisKelamin' => $this->faker->boolean ? 1 : 0,
            'tempatLahir' => $this->faker->city,
            'tanggalLahir' => $this->faker->date,
            'agama' => $this->faker->word,
            'pendidikan' => $this->faker->word,
            'namaPekerjaan' => $this->faker->jobTitle,
            'alamatPekerjaan' => $this->faker->address,
            'id_status_pekerjaan' => StatusPekerjaan::factory(),
            'id_status_pengajuan' => StatusPengajuan::factory(),
            'id_status_users' => User::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

