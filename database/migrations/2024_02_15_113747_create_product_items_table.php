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
        Schema::dropIfExists('product_items');
        Schema::create('product_items', function (Blueprint $table) {
            $table->id('idProductItem');
            $table->bigInteger('idProduct')->unsigned();
            $table->foreign('idProduct')->references('idProduct')->on('products')->onDelete('cascade');
            $table->integer('qteStock')->unsigned()->nullable()->default(0);
            $table->decimal('Price', 6, 2)->nullable()->default(0.0);
            $table->string('productItemImage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_items');
    }
};
