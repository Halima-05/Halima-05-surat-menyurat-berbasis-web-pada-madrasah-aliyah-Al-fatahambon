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
        Schema::create('surat_terimas', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('nama_siswa');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('nisn');
            $table->string('kelas');
            $table->string('asal_sekolah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_terimas');
    }
};
