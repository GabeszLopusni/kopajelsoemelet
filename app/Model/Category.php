<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{

    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function sub_categories(){
        return $this->hasMany('App\Model\Sub_Category');
    }
}
