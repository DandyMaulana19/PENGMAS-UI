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
        Schema::create('datadiriberkas', function (Blueprint $table) {
            $table->uuid('dataDiri_id');
            $table->uuid('berkas_id');
            $table->primary(['dataDiri_id', 'berkas_id']);
            $table->foreign('dataDiri_id')->references('id')->on('datadiri')->onDelete('cascade');
            $table->foreign('berkas_id')->references('id')->on('berkas')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datadiriberkas');
    }
};
