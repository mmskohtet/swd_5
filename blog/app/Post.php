<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getCategory(){
        return $this->belongsTo("App\Category","category_id");
    }

    public function getPhoto(){
        return $this->hasOne("App\Photo","post_id");
    }

    public function getPhotos(){
        return $this->hasMany("App\Photo","post_id");
    }

    public function getUser(){
        return $this->belongsTo("App\User","user_id");
    }
}
