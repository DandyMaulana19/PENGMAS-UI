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
        Schema::create('kelurahans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('namaKelurahan', 255);
            $table->uuid('id_kecamatan');
            $table->timestamps();

            $table->foreign('id_kecamatan')->references('id')->on('kecamatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecamatans');
    }
};
