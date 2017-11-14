<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Like extends Model{
    public function user(){
        return $this->belongsTo('App\Model\User');
    }

    public function post() {
        return $this->belongsTo('App\Post');
    }
}
