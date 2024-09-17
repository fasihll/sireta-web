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
        Schema::create('perbandingan_berpasangans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('matrix');
            $table->json('matrix_normalized');
            $table->json('matrix_col_sum');
            $table->json('wights');
            $table->json('eigens');
            $table->double('lambda_max');
            $table->double('consistency_index');
            $table->double('random_index');
            $table->double('consistency_ratio');
            $table->boolean('is_consistent');
            $table->string('consistecy');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbandingan_berpasangans');
    }
};
