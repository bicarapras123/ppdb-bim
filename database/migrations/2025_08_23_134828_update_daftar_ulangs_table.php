<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('daftar_ulangs', function (Blueprint $table) {
            // Hapus foreign key constraint
            $table->dropForeign(['siswa_id']);

            // Hapus kolom siswa_id
            $table->dropColumn('siswa_id');

            // Tambah kolom nama_siswa
            $table->string('nama_siswa')->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('daftar_ulangs', function (Blueprint $table) {
            // Kembalikan kolom siswa_id kalau rollback
            $table->unsignedBigInteger('siswa_id')->after('id');
            $table->foreign('siswa_id')->references('id')->on('pendaftaran')->onDelete('cascade');

            // Hapus kolom nama_siswa
            $table->dropColumn('nama_siswa');
        });
    }
};
