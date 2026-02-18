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
        Schema::dropIfExists('shopping_cart_items');
        Schema::create('shopping_cart_items', function (Blueprint $table) {
            $table->bigInteger('idCart')->unsigned();
            $table->foreign('idCart')->references('idCart')->on('carts')->onDelete('cascade');
            $table->bigInteger('idProductItem')->unsigned();
            $table->foreign('idProductItem')->references('idProductItem')->on('product_items')->onDelete('cascade');
            $table->primary(array('idCart','idProductItem'));
            $table->integer('qteProd')->unsigned()->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_cart_items');
    }
};
