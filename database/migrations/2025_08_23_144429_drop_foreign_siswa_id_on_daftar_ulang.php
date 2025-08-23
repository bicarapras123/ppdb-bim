<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('daftar_ulang', function (Blueprint $table) {
            $table->dropForeign(['siswa_id']); // hapus FK
        });
    }

    public function down(): void
    {
        Schema::table('daftar_ulang', function (Blueprint $table) {
            $table->foreign('siswa_id')
                  ->references('id')
                  ->on('pendaftaran')
                  ->onDelete('cascade');
        });
    }
};
