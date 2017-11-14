<?php

namespace App\Model;

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

    public function posts() {
      return $this->hasMany('App\Model\Post', 'id', 'user_id');
    }

    public function comments() {
        return $this->hasMany('App\Model\Comment');
    }

    public function profile_picture() {
        return $this->hasOne('App\Model\Profile_Picture');
    }

    public function cover_picture() {
        return $this->hasOne('App\Model\Cover_Picture');
    }

    public function likes() {
        return $this->hasMany('App\Model\Like');
    }

}
