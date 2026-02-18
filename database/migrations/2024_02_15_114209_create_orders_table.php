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
        Schema::dropIfExists('orders');
        Schema::create('orders', function (Blueprint $table) {
            $table->id('idOrder');
            $table->bigInteger('idClient')->unsigned();
            $table->foreign('idClient')->references('idClient')->on('clients')->onDelete('cascade');
            $table->bigInteger('idAdress')->unsigned();
            $table->foreign('idAdress')->references('idAdress')->on('adresses')->onDelete('cascade');
            $table->bigInteger('idMethod')->unsigned();
            $table->foreign('idMethod')->references('idMethod')->on('methods')->onDelete('cascade');
            $table->bigInteger('idStatus')->unsigned();
            $table->foreign('idStatus')->references('idStatus')->on('statuses')->onDelete('cascade');
            $table->dateTime('orderDate');
            $table->decimal('totalPrice', 6, 2)->nullable()->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
