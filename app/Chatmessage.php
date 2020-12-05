<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatmessage extends Model
{
     protected $fillable = ['chatroom_id', 'user_id','message'];
    public function message_sending_user(){
        return $this->belongTo(User::class);
    }
    public function message_belongs_room(){
        return $this->belongTo(Chatroom::class);
    }
}
