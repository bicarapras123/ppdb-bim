<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nilai_siswas', function (Blueprint $table) {
            $table->string('nama_siswa')->after('siswa_id'); // tambah kolom nama_siswa
        });
    }

    public function down(): void
    {
        Schema::table('nilai_siswas', function (Blueprint $table) {
            $table->dropColumn('nama_siswa');
        });
    }
};
