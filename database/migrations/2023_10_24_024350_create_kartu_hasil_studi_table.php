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
        Schema::create('kartu_hasil_studi', function (Blueprint $table) {
            $table->id();
            $table->integer('semester');
            $table->integer('sks_semester')->nullable();
            $table->integer('sks_kumulatif')->nullable();
            $table->float('ip_semester')->nullable();
            $table->float('ip_kumulatif')->nullable();
            $table->string('nama_file')->unique()->nullable();
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
        Schema::dropIfExists('kartu_hasil_studi');
    }
};
