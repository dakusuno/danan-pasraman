<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
    
    protected $fillable = ['title','content','thumbnail','slug','user_id'];
    protected $dates = ['created_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user() //fungsi relasi
    {
        return $this->belongsTo(User::class);
    }
    
    public function thumbnail() //fungsi default thumbnail
    {
        if($this->thumbnail){
            return $this->thumbnail;
        } else {
            return asset('no-thumb.png');
        }

        // return !$this->thumbnail ? asset('no-thumb.png') : $this->thumbnail;
    }
}
