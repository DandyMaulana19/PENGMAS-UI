<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AdminKecamatan;
use App\Models\AdminKelurahan;
use App\Models\AdminRT;
use App\Models\AdminRW;
use App\Models\DaerahAsal;
use App\Models\DaerahTujuan;
use App\Models\DataDiri;
use App\Models\DataDiriDataKK;
use App\Models\DataKK;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Role;
use App\Models\RT;
use App\Models\RW;
use App\Models\StatusPekerjaan;
use App\Models\StatusPengajuan;
use App\Models\User;
use App\Models\UserRole;
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
        Role::factory()->count(1)->create();
        UserRole::factory()->count(1)->create();
        DataDiri::factory()->count(1)->create();
        DaerahAsal::factory()->count(1)->create();
        Kelurahan::factory()->count(1)->create();
        Kecamatan::factory()->count(1)->create();
        RW::factory()->count(1)->create();
        RT::factory()->count(1)->create();
        DataKK::factory()->count(1)->create();
        DataDiriDataKK::factory()->count(1)->create();
        DaerahTujuan::factory()->count(1)->create();
        $this->call(PengajuanPekerjaanSeeder::class);
        $this->call(StatusPengajuanSeeder::class);
        AdminRT::factory()->count(1)->create();
        AdminRW::factory()->count(1)->create();
        AdminKelurahan::factory()->count(1)->create();
        AdminKecamatan::factory()->count(1)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
