<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\RT;
use App\Models\RW;
use App\Models\Role;
use App\Models\User;
use App\Models\DataKK;
use App\Models\AdminRT;
use App\Models\AdminRW;
use App\Models\DataDiri;
use App\Models\UserRole;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\DaerahAsal;
use Illuminate\Support\Str;
use App\Models\DaerahTujuan;
use App\Models\AdminKecamatan;
use App\Models\AdminKelurahan;
use App\Models\DataDiriDataKK;
use App\Models\StatusPekerjaan;
use App\Models\StatusPengajuan;
use Illuminate\Database\Seeder;
use Database\Seeders\StatusPengajuanSeeder;
use Database\Seeders\PengajuanPekerjaanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // StatusPekerjaan::factory()->count(1)->create();
        // StatusPengajuan::factory()->count(1)->create();
        // User::factory(1)->create();
        // Role::factory()->count(1)->create();
        // UserRole::factory()->count(1)->create();
        // DataDiri::factory()->count(1)->create();
        // DaerahAsal::factory()->count(1)->create();
        // Kecamatan::factory()->count(1)->create();
        // Kelurahan::factory()->count(1)->create();
        // RW::factory()->count(1)->create();
        // RT::factory()->count(1)->create();
        // DataKK::factory()->count(1)->create();
        // DataDiriDataKK::factory()->count(1)->create();
        // DaerahTujuan::factory()->count(1)->create();
        // $this->call(PengajuanPekerjaanSeeder::class);
        // $this->call(StatusPengajuanSeeder::class);
        // AdminRT::factory()->count(1)->create();
        // AdminRW::factory()->count(1)->create();
        // AdminKelurahan::factory()->count(1)->create();
        // AdminKecamatan::factory()->count(1)->create();

        // Status Pekerjaan
        $belumKerja = StatusPekerjaan::create([
            'id' => (string) Str::uuid(),
            'nama_status' => 'Belum Bekerja',
        ]);
        $sudahKerja = StatusPekerjaan::create([
            'id' => (string) Str::uuid(),
            'nama_status' => 'Sudah Bekerja',
        ]);

        // Status Pengajuan
        $pengajuanRt = StatusPengajuan::create([
            'id' => (string) Str::uuid(),
            'nama_status' => 'RT',
        ]);
        $pengajuanRw = StatusPengajuan::create([
            'id' => (string) Str::uuid(),
            'nama_status' => 'RW',
        ]);
        $pengajuanKel = StatusPengajuan::create([
            'id' => (string) Str::uuid(),
            'nama_status' => 'Kelurahan',
        ]);
        $pengajuanKec = StatusPengajuan::create([
            'id' => (string) Str::uuid(),
            'nama_status' => 'Kecamatan',
        ]);

        // User
        $userWarga = User::create([
            'id' => (string) Str::uuid(),
            'name' => 'warga',
            'email' => 'warga@gmail.com',
            'password' => 'password',
        ]);
        $userRt = User::create([
            'id' => (string) Str::uuid(),
            'name' => 'rt',
            'email' => 'rt@gmail.com',
            'password' => 'password',
        ]);
        $userRw = User::create([
            'id' => (string) Str::uuid(),
            'name' => 'rw',
            'email' => 'rw@gmail.com',
            'password' => 'password',
        ]);
        $userKel = User::create([
            'id' => (string) Str::uuid(),
            'name' => 'kelurahan',
            'email' => 'kelurahan@gmail.com',
            'password' => 'password',
        ]);
        $userKec = User::create([
            'id' => (string) Str::uuid(),
            'name' => 'kecamatan',
            'email' => 'kecamatan@gmail.com',
            'password' => 'password',
        ]);

        // Role
        $roleWarga = Role::create([
            'id' => (string) Str::uuid(),
            'name' => 'warga',
        ]);
        $roleRt = Role::create([
            'id' => (string) Str::uuid(),
            'name' => 'rt',
        ]);
        $roleRw = Role::create([
            'id' => (string) Str::uuid(),
            'name' => 'rw',
        ]);
        $roleKel = Role::create([
            'id' => (string) Str::uuid(),
            'name' => 'kelurahan',
        ]);
        $roleKec = Role::create([
            'id' => (string) Str::uuid(),
            'name' => 'kecamatan',
        ]);

        // UserRole
        $userroleWarga = UserRole::create([
            'user_id' => $userWarga->id,
            'role_id' => $roleWarga->id,
        ]);
        $userroleRt = UserRole::create([
            'user_id' => $userRt->id,
            'role_id' => $roleRt->id,
        ]);
        $userroleRw = UserRole::create([
            'user_id' => $userRw->id,
            'role_id' => $roleRw->id,
        ]);
        $userroleKel = UserRole::create([
            'user_id' => $userKel->id,
            'role_id' => $roleKel->id,
        ]);
        $userroleKec = UserRole::create([
            'user_id' => $userKec->id,
            'role_id' => $roleKec->id,
        ]);

        // DataDiri
        DataDiri::create([
            'id'  => (string) Str::uuid(),
            'nik' => '12345',
            'namaLengkap' => 'warga dummy',
            'jenisKelamin' => 1,
            'tempatLahir' => 'Surabaya',
            'tanggalLahir' => '2000-01-01',
            'agama' => 'Islam',
            'pendidikan' => 'S1',
            'namaPekerjaan' => 'Guru',
            'alamatPekerjaan' => 'Jl. Merdeka',
            'id_status_pekerjaan' => $sudahKerja->id,
            'id_status_pengajuan' => $pengajuanRt->id,
            'id_user' => $userWarga->id,
            'urlktp' => 'linkKtp',
            'urlkk' => 'linkKk',
            'urlbukunikah' => 'linkBukuNikah',
        ]);

        // DaerahAsal
        DaerahAsal::create([
            'dataDiri_id' => DataDiri::first()->id,
            'alamat' => 'Jl. Ketintang',
            'namaProvinsi' => 'Jawa Timur',
            'namaKabupaten' => 'Surabaya',
            'namaKecamatan' => 'Ketintang',
            'namaKelurahan' => 'Gayungan',
            'namaRw' => '01',
            'namaRt' => '02',
        ]);

        // Kecamatan
        Kecamatan::create([
            'id' => (string) Str::uuid(),
            'namaKecamatan' => 'Duduk Sampeyan',
            'namaKabupaten' => 'Gresik',
            'namaProvinsi' => 'Jawa Timur',
        ]);

        // Kelurahan
        Kelurahan::create([
            'id' => (string) Str::uuid(),
            'namaKelurahan' => 'Duduk Aku',
            'id_kecamatan' => Kecamatan::first()->id,
        ]);

        // RW
        RW::create([
            'id' => (string) Str::uuid(),
            'nama' => '11',
            'id_Kelurahan' => Kelurahan::first()->id,
        ]);

        // RT
        RT::create([
            'id' => (string) Str::uuid(),
            'nama' => '12',
            'rw_id' => RW::first()->id,
        ]);

        // DataKK
        DataKK::create([
            'id' => (string) Str::uuid(),
            'alamat' => 'Jl. A Yani',
            'no_kk' => '54321',
            'rt_id' => RT::first()->id,
        ]);

        // DataDiri DataKK
        DataDiriDataKK::create([
            'dataDiri_id' => DataDiri::first()->id,
            'dataKk_id' => DataKK::first()->id,
        ]);

        // DaerahTujuan
        DaerahTujuan::create([
            'dataDiri_id' => DataDiri::first()->id,
            'alamat' => 'Jl. Tunjungan',
            'namaProvinsi' => 'Jawa Timur',
            'namaKabupaten' => 'Surabaya',
            'namaKecamatan' => 'Tunjungan',
            'namaKelurahan' => 'Bagus',
            'namaRw' => '03',
            'namaRt' => '04',
        ]);

        // Admin RT
        AdminRT::create([
            'user_id' => $userRt->id,
            'rt_id' => RT::first()->id,
        ]);

        // Admin RW
        AdminRW::create([
            'user_id' => $userRw->id,
            'rw_id' => RW::first()->id,
        ]);

        // Admin Kelurahan
        AdminKelurahan::create([
            'user_id' => $userKel->id,
            'kelurahan_id' => Kelurahan::first()->id,
        ]);

        // Admin Kecamatan
        AdminKecamatan::create([
            'user_id' => $userKec->id,
            'kecamatan_id' => Kecamatan::first()->id,
        ]);
    }
}
