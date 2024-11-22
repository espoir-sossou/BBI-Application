<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'nom', 'prenom', 'email', 'password', 'role', 'sexe' ,'telephone', 'adresse'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Retourne l'identifiant unique de l'utilisateur
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        // Vérifiez que l'ID de l'utilisateur est correct et non null
        return $this->user_id; // Si vous utilisez "user_id" comme clé primaire
    }


    /**
     * Get custom JWT claims for the user.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'role' => $this->role, // Exemple : Ajouter le rôle de l'utilisateur dans le JWT
        ];
    }
    public function paniers()
{
    return $this->hasMany(Panier::class, 'user_id', 'user_id');
}

}
