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
        Schema::create('reports', function (Blueprint $table) {
            $table->id('idReport');
            $table->enum('reporterType', ['Magasinier', 'Client']);
            $table->bigInteger('idReporter')->unsigned();
            $table->enum('reportedType', ['Magasinier', 'Client']);
            $table->bigInteger('idReported')->unsigned();
            $table->dateTime('reportDate');
            $table->text('reason');
            $table->enum('status', ['Pending', 'Resolved', 'Rejected'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};

// Manually define foreign key constraints after table creation
Schema::table('reports', function (Blueprint $table) {
    if (Schema::hasColumn('reports', 'reporterType')) {
        if ($table->enum('reporterType', ['Magasinier', 'Client'])->default('Magasinier') == 'Magasinier') {
            $table->foreign('idReporter')->references('idMagasinier')->on('magasiniers')->onDelete('cascade');
        } elseif ($table->enum('reporterType', ['Magasinier', 'Client'])->default('Client') == 'Client') {
            $table->foreign('idReporter')->references('idClient')->on('clients')->onDelete('cascade');
        }
    }

    if (Schema::hasColumn('reports', 'reportedType')) {
        if ($table->enum('reportedType', ['Magasinier', 'Client'])->default('Magasinier') == 'Magasinier') {
            $table->foreign('idReported')->references('idMagasinier')->on('magasiniers')->onDelete('cascade');
        } elseif ($table->enum('reportedType', ['Magasinier', 'Client'])->default('Client') == 'Client') {
            $table->foreign('idReported')->references('idClient')->on('clients')->onDelete('cascade');
        }
    }
});






?>