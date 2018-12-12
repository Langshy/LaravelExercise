<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //一对多
    public function statuses(){
        return $this->hasMany(Status::class);
    }

    //多对多
    public function followers(){
        return $this->belongsToMany(User::class,'followers','user_id','follower_id');
    }

    public function followings(){
        return $this->belongsToMany(User::Class, 'followers', 'follower_id', 'user_id');
    }

    public function gravatar($size = '100'){
        $hash = md5(strtolower($this->attributes['email']));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }
    //关注
    public function follow($user_id){
        if(is_array($user_id)){
            $user_id = compact('user_id');
        }
        $this->followings()->sync($user_id,false);
    }

    //取消关注
    public function unfollow($user_id){
        if(is_array($user_id)){
            $user_id = compact('user_id');
        }
        $this->followings()->detach($user_id);
    }

    public function isFollowing($user_id)
    {
        return $this->followings->contains($user_id);
    }


    public static function boot(){
        parent::boot();

        static::creating(function ($user){
            $user->activation_token = str_random(30);
        });
    }

    public function feed(){
//        return $this->statuses()->orderBy('created_at','desc');
        $user_ids = Auth::user()->followings->pluck('id')->toArray();
        array_push($user_ids, Auth::user()->id);
        return Status::whereIn('user_id', $user_ids)
            ->with('user')
            ->orderBy('created_at', 'desc');
    }
}


