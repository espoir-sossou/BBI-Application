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
        Schema::create('offre_en_vedettes', function (Blueprint $table) {
            $table->id('offre_en_vedettes_id');
            $table->string('titre');
            $table->text('description');
            $table->string('typePropriete');
            $table->float('montant');
            $table->float('superficie');
            $table->integer('nbChambres');
            $table->integer('nbSalleDeDouche');
            $table->integer('veranda');
            $table->integer('terrasse');
            $table->integer('cuisine');
            $table->integer('dependance');
            $table->integer('piscine');
            $table->integer('garage');
            $table->integer('titreFoncier');
            $table->string('localite');
            $table->string('localisation');
            $table->text('details')->nullable();
            $table->string('typeTransaction');
            $table->string('visite360')->nullable();
            $table->dateTime('dateCreation')->default(now());
            $table->boolean('validee')->default(false);
            $table->string('video')->nullable();
            $table->string('image');

            // Colonnes pour les IDs des utilisateurs
            $table->unsignedBigInteger('user_id'); // ID de l'utilisateur qui crée l'annonce
            $table->unsignedBigInteger('admin_id')->nullable(); // ID de l'administrateur (sera utilisé pour l'envoi de l'email)

            // Relations avec la table users
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('admin_id')->references('user_id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offre_en_vedettes');
    }
};
