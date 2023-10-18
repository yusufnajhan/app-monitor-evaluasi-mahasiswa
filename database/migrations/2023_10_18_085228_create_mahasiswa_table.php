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
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nim')->unique();
            $table->string('nama');
            $table->year('angkatan')->default(date('Y'));
            $table->string('status')->default('Aktif');
            $table->string('jalur_masuk');
            $table->string('no_telepon');
            $table->string('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('id_dosen_wali');
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
