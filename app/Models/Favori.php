<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'annonce_id'];

    public function annonce()
    {
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }
}