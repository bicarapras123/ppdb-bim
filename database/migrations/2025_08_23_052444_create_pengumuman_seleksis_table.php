<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengumuman_seleksis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->enum('status', ['draft', 'publish'])->default('draft');
            $table->date('tanggal_pengumuman');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumuman_seleksis');
    }
};
