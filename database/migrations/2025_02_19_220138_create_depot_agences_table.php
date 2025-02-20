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
        Schema::create('depot_agences', function (Blueprint $table) {
            $table->id();
            $table->string('nom_client');
            $table->string('nom_agence');
            $table->string('montant_verse');
            $table->string('description');


            $table->foreign('nom_depositaire')->references('name')->on('users')->onDelete('cascade');
            $table->foreign('nom_agence')->references('nom_agence')->on('agences')->onDelete('cascade');
            $table->string('date_depot');
            $table->string('nbre_jours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depot_agences');
    }
};
