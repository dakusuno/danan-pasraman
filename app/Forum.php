<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Forum extends Model implements ViewableContract
{
    use Viewable;

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
        
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }

    public function sisya()
    {
        return $this->belongsTo(Sisya::class);
    }
}
