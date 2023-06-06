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
        Schema::create('data_solusis', function (Blueprint $table) {
            $table->string('kode_solusi')->unique();
            $table->string('nama_solusi');
            $table->timestamps();
            $table->primary('kode_solusi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_solusis');
    }
};
