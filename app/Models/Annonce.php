<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $table = 'annonces'; // Nom de la table dans la base de données
    protected $primaryKey = 'annonce_id'; // Clé primaire

    protected $fillable = [
        'titre',
        'description',
        'typePropriete',
        'montant',
        'superficie',
        'nbChambres',
        'nbSalleDeDouche',
        'veranda',
        'terrasse',
        'cuisine',
        'dependance',
        'piscine',
        'garage',
        'localite',
        'titreFoncier',
        'localisation',
        'details',
        'typeTransaction',
        'visite360',
        'dateCreation',
        'validee',
        'video',
        'image',
        'assigned_admin_id',
    ];

    /**
     * Relation avec le modèle User (table Prisma `User`).
     */
    public function assignedAdmin()
    {
        return $this->belongsTo(User::class, 'assigned_admin_id', 'user_id');
    }
}
