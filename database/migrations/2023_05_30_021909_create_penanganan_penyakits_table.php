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
        Schema::create('penanganan_penyakits', function (Blueprint $table) {
            $table->id();
            $table->string('penyakit_id')->references('id')->on('data_penyakits')->onDelete('cascade');;
            $table->string('solusi_id')->references('id')->on('data_solusis')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanganan_penyakits');
    }
};
