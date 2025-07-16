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
        Schema::table('donations', function (Blueprint $table) {
            $table->integer('kode_unik')->default(0)->after('program_type');
            $table->integer('total_donasi')->default(0)->after('kode_unik');
        });
    }


    public function down()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn(['kode_unik', 'total_donasi']);
        });
    }

};
