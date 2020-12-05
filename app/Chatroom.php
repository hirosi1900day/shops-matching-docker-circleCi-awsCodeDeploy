<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    
    
    public function message_users(){
        return $this->belongToMany(User::class,'chatmessges','chatroom_id','user_id');
    }
    public function chatroom_message(){
        return $this->hasMany(Chatmessage::class);
    }
      public function chatRoom_Users()
    {
        return $this->hasMany(ChatRoomUser::class);
    }
    
}
