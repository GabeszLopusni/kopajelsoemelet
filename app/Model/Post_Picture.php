<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post_Picture extends Model{
    public function post() {
        return $this->belongsTo('App\Post');
    }
}
