<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function getRouteKeyName()
    {
        return 'username';
    }
    
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_user_id')->withTimestamps();
    }
    
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_user_id', 'user_id')->withTimestamps();
    }
    
    public function isFollowing(User $user)
    {
        return auth()->user()->following->contains($user) ? 'true' : 'false' ;
    }
    
}
