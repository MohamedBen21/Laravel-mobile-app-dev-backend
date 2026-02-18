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
        Schema::dropIfExists('otp_codes');
        Schema::create('otp_codes', function (Blueprint $table) {
            $table->id('idOtpCode');
            $table->bigInteger('idUtilisateur')->unsigned();
            $table->foreign('idUtilisateur')->references('idUtilisateur')->on('utilisateurs')->onDelete('cascade');
            $table->String('Email');
            $table->integer('Otp')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otp_codes');
    }
};
