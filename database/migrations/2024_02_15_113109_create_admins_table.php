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
        Schema::dropIfExists('admins');
        Schema::create('admins', function (Blueprint $table) {
            $table->id('idAdmin');
            $table->bigInteger('idUtilisateur')->unsigned();
            $table->foreign('idUtilisateur')->references('idUtilisateur')->on('utilisateurs')->onDelete('cascade');
            $table->string('Role');
            $table->string('Username');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
