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
        Schema::dropIfExists('magasins');
        Schema::create('magasins', function (Blueprint $table) {
            $table->id('idMagasin');
            $table->bigInteger('idMagasinier')->unsigned();
            $table->foreign('idMagasinier')->references('idMagasinier')->on('magasiniers')->onDelete('cascade');
            $table->string('Category');
            $table->string('name');
            $table->string('magasinImage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magasins');
    }
};
