<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    protected $primaryKey = 'panier_id'; // Spécifie la clé primaire
    protected $fillable = ['user_id', 'annonce_id'];

    // Relation avec User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // Relation avec Annonce
    public function annonce()
    {
        return $this->belongsTo(Annonce::class, 'annonce_id', 'annonce_id');
    }
}
