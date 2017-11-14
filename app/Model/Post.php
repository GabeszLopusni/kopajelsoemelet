<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
      return $this->belongsTo('App\Model\User', 'user_id', 'id');
    }

    public function categories() {
        return $this->hasMany('App\Model\Category');
    }

    public function  sub_categories() {
        return $this->hasMany('App\Model\Sub_Category');
    }

    public function comments() {
        return $this->hasMany('App\Model\Comment');
    }

    public function post_picture() {
        return $this->hasOne('App\Model\Post_Picture');
    }

    public function likes() {
        return $this->hasMany('App\Model\Like');
    }
}
