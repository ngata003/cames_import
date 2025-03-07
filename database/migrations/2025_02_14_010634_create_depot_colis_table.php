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
        Schema::create('depot_colis', function (Blueprint $table) {
            $table->id();
            $table->string('nom_client');
            $table->string('nom_agence');
            $table->string('date_depart');
            $table->string('couleur_colis')->nullable();
            $table->string('status');
            $table->string('nom_gestionnaire');
            $table->string('moyen_transport');
            $table->string('nom_entreprise');
            $table->integer('duree_trajet');
            $table->string('image_colis')->nullable();


            $table->foreign('nom_gestionnaire')->references('name')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nom_entreprise')->references('nom_entreprise')->on('entreprises')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nom_client')->references('nom_client')->on('factures')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nom_agence')->references('nom_agence')->on('agences')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depot_colis');
    }
};
