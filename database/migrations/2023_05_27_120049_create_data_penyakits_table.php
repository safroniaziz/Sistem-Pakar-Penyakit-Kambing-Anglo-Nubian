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
        Schema::create('data_penyakits', function (Blueprint $table) {
            $table->string('kode_penyakit')->unique();
            $table->string('nama_penyakit');
            $table->string('deskripsi');
            $table->string('foto')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();
            $table->primary('kode_penyakit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penyakits');
    }
};
