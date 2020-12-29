<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['name','tags_id'];
    public function shops()
   {
       return $this->belongsToMany(Shop::class,'post_tags','tags_id','shop_id')>withTimestamps();
   }
}
