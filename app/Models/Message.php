<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $primaryKey = 'message_id';
    protected $fillable = ['sender_id', 'receiver_id', 'content', 'is_read'];

    // Relations
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    public function receiverSellerProfile()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id')->select(['id', 'name']);
    }

    public function senderSellerProfile()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id')->select(['id', 'name']);
    }
}
