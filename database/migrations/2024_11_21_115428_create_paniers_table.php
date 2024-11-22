<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paniers', function (Blueprint $table) {
            $table->id('panier_id'); // ID unique du panier
            $table->unsignedBigInteger('user_id'); // ID de l'utilisateur
            $table->unsignedBigInteger('annonce_id'); // ID de l'annonce ajoutée au panier
            $table->timestamps(); // Champs created_at et updated_at

            // Clés étrangères
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('annonce_id')->references('annonce_id')->on('annonces')->onDelete('cascade');

            // Empêcher un utilisateur d'ajouter la même annonce plusieurs fois
            $table->unique(['user_id', 'annonce_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paniers');
    }
};
