<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    public function shop(){
        return $this->belongTo(Shop::class);
        
    }
    public function message_users(){
        return $this->belongToMany(User::class,'chatmessges','room_id','user_id');
    }
    public function chatroom_message(){
        return $this->hasMany(Chatmessage::class);
    }
    
}
