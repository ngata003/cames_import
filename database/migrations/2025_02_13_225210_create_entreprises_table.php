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
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom_entreprise')->unique();
            $table->string('email_entreprise')->nullable();
            $table->string('logo_entreprise')->nullable();
            $table->string('site_web')->nullable();
            $table->string('fax_entreprise')->unique();
            $table->string('localisation')->nullable();
            $table->string('nom_gestionnaire');
            $table->boolean('is_connected')->default(false);


            $table->foreign('nom_gestionnaire')->references('name')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
