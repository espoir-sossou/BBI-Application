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
        Schema::table('offre_en_vedettes', function (Blueprint $table) {
            // Si la colonne 'montant' existe déjà, la modifier
            $table->double('montant')->change();
            $table->double('superficie')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offre_en_vedettes', function (Blueprint $table) {
            // Revenir à l'ancien type de la colonne si nécessaire
            $table->integer('montant')->change(); // ou utilisez un autre type si nécessaire
            $table->integer('superficie')->nullable()->change();
        });
    }
};
