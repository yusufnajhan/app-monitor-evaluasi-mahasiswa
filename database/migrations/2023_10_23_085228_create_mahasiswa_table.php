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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama');
            $table->year('angkatan')->default(date('Y'));
            $table->string('status')->default('Aktif');
            $table->string('jalur_masuk')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kota')->nullable();
            $table->string('alamat')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('dosen_wali_id')->nullable();
            // $table->unsignedBigInteger('isian_rencana_semester_id')->nullable();

            $table->index('user_id');
            // $table->index('isian_rencana_semester_id');
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('provinsi')->references('kode_prov')->on('tb_provs');
            // $table->foreign('kota')->references('kode_kab')->on('tb_kabs');
            // $table->foreign('isian_rencana_semester_id')->references('id')->on('isian_rencana_semester');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
