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
        Schema::create('retraits', function (Blueprint $table) {
            $table->id();
            $table->string('nom_client');
            $table->date('date_retrait');
            $table->string('nom_agence');
            $table->string('nom_entreprise');
            $table->string('nom_gestionnaire');


            $table->foreign('nom_agence')->references('nom_agence')->on('agences')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nom_entreprise')->references('nom_entreprise')->on('entreprises')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nom_gestionnaire')->references('name')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retraits');
    }
};
