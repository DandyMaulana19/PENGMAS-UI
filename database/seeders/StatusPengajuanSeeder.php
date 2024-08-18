<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusPengajuan;

class StatusPengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        StatusPengajuan::factory()->rt()->create();
        StatusPengajuan::factory()->rw()->create();
        StatusPengajuan::factory()->kelurahan()->create();
        StatusPengajuan::factory()->kecamatan()->create();
    }
}
