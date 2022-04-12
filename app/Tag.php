<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function forum() //relasi many to many dngn nabe 
    {
        return $this->belongsToMany(Forum::class);
    }
}
