<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    protected $fillable = [
        'shop_id', 'user_id', 
    ];
    public function message(){
        return $this->hasMany(Chatmessage::class);
    }
}
