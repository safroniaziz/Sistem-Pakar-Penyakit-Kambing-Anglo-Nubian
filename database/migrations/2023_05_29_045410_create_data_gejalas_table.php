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
        Schema::create('data_gejalas', function (Blueprint $table) {
            $table->string('kode_gejala')->unique();
            $table->string('nama_gejala');
            $table->string('foto')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();
            $table->primary('kode_gejala');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_gejalas');
    }
};
