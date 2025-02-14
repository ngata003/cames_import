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
        Schema::create('agences', function (Blueprint $table) {
            $table->id();
            $table->string('nom_agence')->unique();
            $table->string('contact_agence')->unique();
            $table->string('site_web')->nullable();
            $table->string('localisation')->nullable();
            $table->string('email_agence')->nullable()->unique();
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
        Schema::dropIfExists('agences');
    }
};
