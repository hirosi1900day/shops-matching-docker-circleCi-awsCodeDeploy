<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['image_location'];
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
