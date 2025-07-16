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
        Schema::table('program', function (Blueprint $table) {
            $table->string('slug')->unique()->after('judul');
            $table->text('deskripsi')->after('slug');
            $table->string('lokasi')->after('deskripsi');
            $table->string('gambar')->nullable()->after('target');
        });
    }

    public function down()
    {
        Schema::table('program', function (Blueprint $table) {
            $table->dropColumn(['slug', 'deskripsi', 'lokasi', 'gambar']);
        });
    }

};
