<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function getPhoto(){

        return $this->hasManyThrough("App\Photo","App\Post");

    }

}
