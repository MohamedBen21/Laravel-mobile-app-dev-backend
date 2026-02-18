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
        Schema::dropIfExists('variations');
        Schema::create('variations', function (Blueprint $table) {
            $table->id('idVariation');
            $table->bigInteger('idMagasin')->unsigned();
            $table->foreign('idMagasin')->references('idMagasin')->on('magasins')->onDelete('cascade');
            $table->string('Name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variations');
    }
};
