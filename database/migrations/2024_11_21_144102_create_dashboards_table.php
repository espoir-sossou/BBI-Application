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
        if (!Schema::hasTable('dashboards')) {
            Schema::create('dashboards', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id'); // ID de l'utilisateur

                // Clés étrangères
                $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
                $table->text('content')->nullable();  // Contenu du tableau de bord (peut être vide au départ)
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboards');
    }
};
