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
        Schema::create('adminkelurahans', function (Blueprint $table) {
            $table->uuid('user_id');
            $table->uuid('kelurahan_id');
            $table->primary(['user_id', 'kelurahan_id']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kelurahan_id')->references('id')->on('kelurahans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminkelurahans');
    }
};
