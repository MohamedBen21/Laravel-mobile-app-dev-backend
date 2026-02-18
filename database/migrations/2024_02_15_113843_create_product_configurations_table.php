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
        Schema::dropIfExists('product_configurations');
        Schema::create('product_configurations', function (Blueprint $table) {
            $table->bigInteger('idProductItem')->unsigned();
            $table->foreign('idProductItem')->references('idProductItem')->on('product_items')->onDelete('cascade');
            $table->bigInteger('idVariationOption')->unsigned();
            $table->foreign('idVariationOption')->references('idVariationOption')->on('variation_options')->onDelete('cascade');
            $table->primary(array('idProductItem','idVariationOption'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_configurations');
    }
};
