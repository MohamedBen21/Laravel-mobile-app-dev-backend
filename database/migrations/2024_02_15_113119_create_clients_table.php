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
        Schema::dropIfExists('clients');
        Schema::create('clients', function (Blueprint $table) {
            $table->id('idClient');
            $table->bigInteger('idUtilisateur')->unsigned();
            $table->foreign('idUtilisateur')->references('idUtilisateur')->on('utilisateurs')->onDelete('cascade');
            $table->bigInteger('idAdress')->unsigned();
            $table->foreign('idAdress')->references('idAdress')->on('adresses')->onDelete('cascade');
            $table->string('Username');
            $table->string('clientImage');
            $table->integer('buysCount')->unsigned()->nullable()->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
