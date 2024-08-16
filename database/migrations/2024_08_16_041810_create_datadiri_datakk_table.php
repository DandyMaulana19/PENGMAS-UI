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
        Schema::create('datadiri_datakk', function (Blueprint $table) {
            $table->uuid('dataDiri_id');
            $table->uuid('dataKk_id');
            $table->primary(['dataDiri_id', 'dataKk_id']);
            $table->foreign('dataDiri_id')->references('id')->on('datadiri')->onDelete('cascade');
            $table->foreign('dataKk_id')->references('id')->on('datakk')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datadiri_datakk');
    }
};
