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
        Schema::create('progres_praktik_kerja_lapangan', function (Blueprint $table) {
            $table->id();
            $table->integer('semester')->nullable();
            $table->integer('nilai')->nullable();
            $table->string('nama_file')->nullable();
            $table->boolean('sudah_disetujui')->nullable();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progres_praktik_kerja_lapangan');
    }
};
