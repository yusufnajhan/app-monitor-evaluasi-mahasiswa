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
        Schema::create('isian_rencana_semester', function (Blueprint $table) {
            $table->id();
            $table->integer('semester');
            $table->integer('sks')->nullable();
            $table->string('nama_file')->unique()->nullable();
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
        Schema::dropIfExists('isian_rencana_semester');
    }
};
