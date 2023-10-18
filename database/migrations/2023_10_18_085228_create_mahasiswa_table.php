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
            $table->string('jalur_masuk');
            $table->string('no_telepon');
            $table->string('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('dosen_wali_id');

            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
