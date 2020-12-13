<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatmessage extends Model
{
    protected $fillable = ['chatroom_id', 'user_id','shop_id','message'];
    public function user(){
        return $this->belongTo(User::class);
    }
     public function shop(){
        return $this->belongTo(Shop::class);
    }
    public function chatrooms(){
        return $this->hasMany(Chatroom::class);
    }
}
