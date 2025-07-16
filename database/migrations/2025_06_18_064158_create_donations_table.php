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
    Schema::create('donations', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('whatsapp');
        $table->string('email');
        $table->integer('nominal');
        $table->string('doa')->nullable();
        $table->string('payment_method');
        $table->string('program_type'); // default "infaq"
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
