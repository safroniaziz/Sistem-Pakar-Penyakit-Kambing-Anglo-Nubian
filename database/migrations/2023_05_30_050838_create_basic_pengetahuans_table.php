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
        Schema::create('basic_pengetahuans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penyakit')->reference('id')->on('data_penyakits')->onDelete('cascade');
            $table->string('kode_gejala')->reference('id')->on('data_gejalas')->onDelete('cascade');
            $table->string('mb');
            $table->string('md');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_pengetahuans');
    }
};
