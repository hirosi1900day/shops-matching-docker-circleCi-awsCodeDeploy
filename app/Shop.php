<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name','shop_introduce','image_location','free_time','shop_location',
    'shop_location_prefecture','shop_type'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function shop_chatmessages(){
        return $this->hasMany(Chatmessage::class);
        
    }
    public function gallerys()
    {
        return $this->hasMany(Gallery::class);
    }
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'shop_id', 'user_id')->withTimestamps();
    }
    
}
