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
        Schema::create('alternatif_kriterias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wisata_id')->references('id')->on('wisatas')->onDelete('cascade');
            $table->foreignId('kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
            $table->double('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif_kriterias');
    }
};
