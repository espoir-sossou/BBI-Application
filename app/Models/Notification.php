<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'message',
        'is_read',
        'type',
        'created_at'
    ];

    // Relation avec User si nécessaire
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
