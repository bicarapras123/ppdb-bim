<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('nilai_siswas', function (Blueprint $table) {
            $table->enum('status_kelulusan', ['Lulus', 'Tidak Lulus'])->nullable()->after('nilai');
        });
    }
    
    public function down()
    {
        Schema::table('nilai_siswas', function (Blueprint $table) {
            $table->dropColumn('status_kelulusan');
        });
    }
    
};
