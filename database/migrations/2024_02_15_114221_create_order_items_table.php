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
        Schema::dropIfExists('order_items');
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('idOrderItem');
            $table->bigInteger('idProductItem')->unsigned();
            $table->foreign('idProductItem')->references('idProductItem')->on('product_items')->onDelete('cascade');
            $table->bigInteger('idOrder')->unsigned();
            $table->foreign('idOrder')->references('idOrder')->on('orders')->onDelete('cascade');
            $table->integer('qteItem')->unsigned()->nullable()->default(0);
            $table->decimal('Price', 6, 2)->nullable()->default(0.0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
