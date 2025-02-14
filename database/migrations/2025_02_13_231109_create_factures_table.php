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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('nom_client');
            $table->string('email_client');
            $table->string('numero_client');
            $table->string('moyen_paiement')->nullable();
            $table->string('total_achat');
            $table->string('montant_paye');
            $table->string('reste')->nullable();
            $table->string('nom_gestionnaire');
            $table->string('nom_entreprise');

            $table->foreign('nom_gestionnaire')->references('name')->on('users')->onDelete('cascade');
            $table->foreign('nom_entreprise')->references('nom_entreprise')->on('entreprises')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
