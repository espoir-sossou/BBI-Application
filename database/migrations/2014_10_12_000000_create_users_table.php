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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('username')->nullable();
            $table->string('sexe')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->nullable(); // 'Admin', 'Agent', 'Acheteur', 'Vendeur'
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
            $table->string('status')->default('active');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
