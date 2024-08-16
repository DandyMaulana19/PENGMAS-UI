<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DataDiri;
use App\Models\StatusPekerjaan;
use App\Models\StatusPengajuan;
use App\Models\User;

class PengajuanPekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusPekerjaan = StatusPekerjaan::factory()->create();
        $statusPengajuan = StatusPengajuan::factory()->create();
        $user = User::factory()->create();

        DataDiri::factory()->create([
            'id_status_pekerjaan' => $statusPekerjaan->id,
            'id_status_pengajuan' => $statusPengajuan->id,
            'id_status_users' => $user->id,
        ]);
    }

}
