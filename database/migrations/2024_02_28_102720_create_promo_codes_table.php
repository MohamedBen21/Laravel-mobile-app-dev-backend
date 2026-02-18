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
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id('idPromoCode');
            $table->bigInteger('idAdmin')->unsigned();
            $table->foreign('idAdmin')->references('idAdmin')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('promo_codes');
    }
};
