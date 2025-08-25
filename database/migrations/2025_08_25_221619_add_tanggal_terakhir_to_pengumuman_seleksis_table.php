<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengumuman_seleksis', function (Blueprint $table) {
            $table->date('tanggal_terakhir')->nullable()->after('tanggal_pengumuman');
        });
    }

    public function down(): void
    {
        Schema::table('pengumuman_seleksis', function (Blueprint $table) {
            $table->dropColumn('tanggal_terakhir');
        });
    }
};
