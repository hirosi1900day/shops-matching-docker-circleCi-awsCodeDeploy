<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','self_introduce','profile_image_location'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function shops(){
        return $this->hasMany(Shop::class);
    }
    
    public function message_chatrooms(){
        return $this->belongsToMany(Chatroom::class,'chatmessges','user_id','chatroom_id');
    }
    public function user_message(){
        return $this->hasMany(Chatmessage::class);
    }
    public function recruit(){
        return $this->hasMany(Recruit::class);
    }
    //お気にいり機能
    public function favorites()
    {
        return $this->belongsToMany(Shop::class, 'favorites', 'user_id', 'shop_id')->withTimestamps();
    }
    public function is_favorite($shopId){
        return $this->favorites()->where('shop_id',$shopId)->exists();
    }
    public function favorite($shopId){
        // すでにお気に入りしているかの確認
        $exist = $this->is_favorite($shopId);
        if ($exist) {
            // すでにお気に入りしていれば何もしない
            return false;
        } else {
            $this->favorites()->attach($shopId);
            return true;
        }
    } 
    
    public function unfavorite($shopId){
        $exist = $this->is_favorite($shopId);
        if ($exist) {
            $this->favorites()->detach($shopId);
            return true;
        } else {
            return false;
        }
    }
    //募集機能
    public function recruits(){
        return $this->belongsToMany(Recruit::class,'recruits_users','user_id','recruit_id')->withTimestamps();
    }
    public function is_recruiting($recruitId)
    {
        // フォロー中ユーザの中に $userIdのものが存在するか
        return $this->recruits()->where('recruit_id', $recruitId)->exists();
    }
    public function recruit_match($recruitId){
        $exist = $this->is_recruiting($recruitId);
        if ($exist) {
            // すでにお気に入りしていれば何もしない
            return false;
        } else {
            $this->recruits()->attach($recruitId);
            return true;
        }
    }
    public function recruit_match_delete($recruitId){
        $exist = $this->is_recruiting($recruitId);
        
        if ($exist) {
            // すでにフォローしていればフォローを外す
            $this->recruits()->detach($recruitId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
} 
