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
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->id('idProduct');
            $table->bigInteger('idMagasin')->unsigned();
            $table->foreign('idMagasin')->references('idMagasin')->on('magasins')->onDelete('cascade');
            $table->string('Name');
            $table->string('Description');
            $table->string('Category');
            $table->string('productImage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
