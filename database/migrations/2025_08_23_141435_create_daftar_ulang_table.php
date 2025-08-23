<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daftar_ulang', function (Blueprint $table) {
            $table->id();
            $table->string('siswa_id')->unique(); // langsung simpan ID/No Pendaftaran
            $table->string('nama_siswa');
            $table->string('bukti_pembayaran');
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daftar_ulang');
    }
};
