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
        Schema::create('progres_skripsi', function (Blueprint $table) {
            $table->id();
            // Belum ambil, sedang ambil, lulus
            $table->string('status')->nullable();
            $table->char('nilai')->nullable();
            $table->string('nama_file')->nullable();
            $table->timestamp('tanggal_sidang')->nullable();
            $table->integer('semester_tempuh')->nullable();
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
        Schema::dropIfExists('progres_skripsi');
    }
};
