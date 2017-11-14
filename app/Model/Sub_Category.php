<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model{

    public function category(){
        return $this->belongsTo('App\Model\Category');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
