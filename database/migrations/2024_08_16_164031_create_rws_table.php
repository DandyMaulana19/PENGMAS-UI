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
        Schema::create('rws', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama', 255);
            $table->string('id_kelurahan', 255);
            $table->timestamps();

            $table->foreign('id_kelurahan')->references('id')->on('kelurahans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rws');
    }
};
