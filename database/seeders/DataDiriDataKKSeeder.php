<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DataDiri;
use App\Models\DataKK;
use App\Models\DataDiriDataKK;

class DataDiriDataKKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataDiri = DataDiri::factory()->create();
        $dataKK = DataKK::factory()->create();

        dd($dataDiri->id, $dataKK->id); // Debugging to check the IDs

        DataDiriDataKK::create([
            'dataDiri_id' => $dataDiri->id,
            'dataKk_id' => $dataKK->id,
        ]);
    }
}
