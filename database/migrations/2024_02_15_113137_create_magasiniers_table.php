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
        Schema::dropIfExists('magasiniers');
        Schema::create('magasiniers', function (Blueprint $table) {
            $table->id('idMagasinier');
            $table->bigInteger('idUtilisateur')->unsigned();
            $table->foreign('idUtilisateur')->references('idUtilisateur')->on('utilisateurs')->onDelete('cascade');
            $table->bigInteger('idAdress')->unsigned();
            $table->foreign('idAdress')->references('idAdress')->on('adresses')->onDelete('cascade');
            // $table->bigInteger('idMagasin')->unsigned();
            // $table->foreign('idMagasin')->references('idMagasin')->on('magasins')->onDelete('cascade');
            $table->string('Username');
            $table->String('imageMagasinier');
            $table->integer('salesCount')->unsigned()->nullable()->default(0);
            $table->boolean('isValid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magasiniers');
    }
};
