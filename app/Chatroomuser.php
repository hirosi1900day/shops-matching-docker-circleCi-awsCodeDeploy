<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroomuser extends Model
{
    protected $fillable = ['room_id', 'user_id'];

    public function chatRoom()
    {
        return $this->belongsTo(Chatroom::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
