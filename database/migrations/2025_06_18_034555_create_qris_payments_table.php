<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_qris_payments_table.php
    public function up()
    {
        Schema::create('qris_payments', function (Blueprint $table) {
            $table->id();
            $table->string('program_type'); // zakat, infaq, dll
            $table->string('qris_image'); // path image
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qris_payments');
    }
};
