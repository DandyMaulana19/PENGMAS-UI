<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daerahasal', function (Blueprint $table) {
            $table->uuid('dataDiri_id');
            $table->string('alamat', 255);
            $table->string('namaProvinsi', 255);
            $table->string('namaKabupaten', 255);
            $table->string('namaKecamatan', 255);
            $table->string('namaKelurahan', 255);
            $table->string('namaRw', 255);
            $table->string('namaRt', 255);
            $table->timestamps();

            $table->foreign('dataDiri_id')->references('id')->on('datadiri')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daerahasal');
    }
};
