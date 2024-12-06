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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id('annonce_id');
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('typePropriete');
            $table->double('montant');
            $table->double('superficie')->nullable();
            $table->integer('nbChambres')->nullable();
            $table->integer('nbSalleDeDouche')->nullable();
            $table->integer('veranda')->default(0);
            $table->integer('terrasse')->default(0);
            $table->integer('cuisine')->default(0);
            $table->integer('dependance')->default(0);
            $table->integer('piscine')->default(0);
            $table->integer('garage')->default(0);
            $table->integer('titreFoncier')->nullable();
            $table->string('localite');
            $table->decimal('latitude', 10, 8)->nullable(); // Nouveau champ
            $table->decimal('longitude', 11, 8)->nullable(); // Nouveau champ
            $table->text('details')->nullable();
            $table->string('typeTransaction');
            $table->string('visite360')->nullable();
            $table->dateTime('dateCreation')->default(now());
            $table->boolean('validee')->default(false);
            $table->string('video')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('admin_id')->nullable();
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
        Schema::dropIfExists('annonces');
    }
};
