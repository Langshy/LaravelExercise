<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function gravatar($size = '100'){
        $hash = md5(strtolower($this->attributes['email']));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }

    public static function boot(){
        parent::boot();

        static::creating(function ($user){
            $user->activation_token = str_random(30);
        });
    }

    public function feed(){
        return $this->statuses()->orderBy('created_at','desc');
    }
}
