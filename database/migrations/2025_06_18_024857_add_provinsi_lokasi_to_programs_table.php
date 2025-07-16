<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::table('program', function (Blueprint $table) {
        if (!Schema::hasColumn('program', 'provinsi')) {
            $table->string('provinsi')->nullable();
        }

        // Jangan tambahkan 'lokasi' lagi karena sudah ada
        // $table->string('lokasi')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            //
        });
    }
};
