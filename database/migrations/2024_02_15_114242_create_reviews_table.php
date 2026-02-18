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
        Schema::dropIfExists('reviews');
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('idReview');
            $table->bigInteger('idClient')->unsigned();
            $table->foreign('idClient')->references('idClient')->on('clients')->onDelete('cascade');
            $table->bigInteger('idOrderItem')->unsigned();
            $table->foreign('idOrderItem')->references('idOrderItem')->on('order_items')->onDelete('cascade');
            $table->decimal('Rating', 5, 2)->nullable()->default(0.0);
            $table->string('Comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
