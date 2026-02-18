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
        Schema::dropIfExists('variation_options');
        Schema::create('variation_options', function (Blueprint $table) {
            $table->id('idVariationOption');
            $table->bigInteger('idVariation')->unsigned();
            $table->foreign('idVariation')->references('idVariation')->on('variations')->onDelete('cascade');
            $table->string('Value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variation_options');
    }
};
