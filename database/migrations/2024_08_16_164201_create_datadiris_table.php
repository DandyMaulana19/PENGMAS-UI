<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('datadiris', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nik', 255);
            $table->string('namaLengkap', 255);
            $table->tinyInteger('jenisKelamin');
            $table->string('tempatLahir', 255);
            $table->date('tanggalLahir');
            $table->string('agama', 255);
            $table->string('pendidikan', 255);
            $table->string('namaPekerjaan', 255);
            $table->string('alamatPekerjaan', 255);
            $table->uuid('id_status_pekerjaan');
            $table->uuid('id_status_pengajuan');
            $table->uuid('id_status_users');
            $table->timestamps();

            $table->foreign('id_status_pekerjaan')->references('id')->on('statuspekerjaans');
            $table->foreign('id_status_pengajuan')->references('id')->on('statuspengajuans');
            $table->foreign('id_status_users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datadiris');
    }
};
