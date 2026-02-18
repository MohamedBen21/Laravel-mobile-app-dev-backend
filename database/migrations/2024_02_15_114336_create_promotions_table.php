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
        Schema::dropIfExists('promotions');
        Schema::create('promotions', function (Blueprint $table) {
            $table->id('idPromotion');
            $table->bigInteger('idProductItem')->unsigned();
            $table->foreign('idProductItem')->references('idProductItem')->on('product_items')->onDelete('cascade');
            $table->string('Name');
            $table->string('Description');
            $table->integer('discountRate')->unsigned()->nullable()->default(0);
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
