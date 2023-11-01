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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('dosen_wali_id')->nullable();
            // $table->unsignedBigInteger('isian_rencana_semester_id')->nullable();

            $table->index('user_id');
            // $table->index('isian_rencana_semester_id');
            $table->foreign('user_id')->references('id')->on('users');
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
