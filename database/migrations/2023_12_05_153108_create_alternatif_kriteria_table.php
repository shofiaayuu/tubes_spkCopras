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
        Schema::create('alternatif_kriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alternatif');
            $table->unsignedBigInteger('id_kriteria');
            $table->integer('value');
            $table->timestamps();
            $table->foreign('id_alternatif')->references('id')->on('alternatif')->onDelete('cascade');
            $table->foreign('id_kriteria')->references('id')->on('kriteria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif_kriteria');
    }
};
