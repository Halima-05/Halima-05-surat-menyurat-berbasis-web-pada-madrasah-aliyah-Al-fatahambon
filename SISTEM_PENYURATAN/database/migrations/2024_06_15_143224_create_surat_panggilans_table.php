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
        Schema::create('surat_panggilans', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('perihal');
            $table->string('nama_siswa');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('tempat');
            $table->string('nama_guru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_panggilans');
    }
};
