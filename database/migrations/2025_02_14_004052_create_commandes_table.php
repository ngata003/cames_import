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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit');
            $table->string('qte_commandee');
            $table->string('total');
            $table->string('nom_gestionnaire');
            $table->string('nom_entreprise');

            $table->foreign('nom_gestionnaire')->references('name')->on('users')->onDelete('cascade');
            $table->foreign('nom_entreprise')->references('nom_entreprise')->on('entreprises')->onDelete('cascade');
            $table->foreignId('id_facture')->references('id')->on('factures')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
