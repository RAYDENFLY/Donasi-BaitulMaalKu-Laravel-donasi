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
        Schema::table('qris_payments', function (Blueprint $table) {
            $table->string('image_path')->after('program_type');
        });
    }

    public function down()
    {
        Schema::table('qris_payments', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
};
