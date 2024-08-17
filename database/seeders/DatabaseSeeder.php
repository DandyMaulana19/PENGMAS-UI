<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DaerahTujuan;
use App\Models\DataDiri;
use App\Models\DataDiriDataKK;
use App\Models\DataKK;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\RT;
use App\Models\RW;
use App\Models\StatusPekerjaan;
use App\Models\StatusPengajuan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        StatusPekerjaan::factory()->count(1)->create();
        StatusPengajuan::factory()->count(1)->create();
        User::factory(1)->create();
        DataDiri::factory()->count(1)->create();
        Kelurahan::factory()->count(1)->create();
        Kecamatan::factory()->count(1)->create();
        RW::factory()->count(1)->create();
        RT::factory()->count(1)->create();
        DataKK::factory()->count(1)->create();
        DataDiriDataKK::factory()->count(1)->create();
        DaerahTujuan::factory()->count(1)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
