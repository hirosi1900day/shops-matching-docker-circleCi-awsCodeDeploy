<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    protected $fillable = ['content','title'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function users(){
        return $this->belongsToMany(User::class,'recruits_users','recruit_id','user_id')->withTimestamps();
    }
}
