<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daftar_ulangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id'); // relasi ke tabel siswa/pendaftaran
            $table->string('bukti_pembayaran');     // path gambar
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('pendaftaran')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daftar_ulangs');
    }
};
