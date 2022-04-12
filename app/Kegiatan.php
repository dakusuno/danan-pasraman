<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Kegiatan extends Model
{
    use Sluggable;

    protected $fillable = ['judul','deskripsi','tanggal_mulai','tanggal_akhir','tempat','jalan','kota','thumbnail','slug'];
    protected $dates = ['tanggal_mulai','tanggal_akhir'];
    
     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
        if($this->thumbnail){
            return $this->thumbnail;
        } else {
            return asset('no-thumb.jpg');
        }

       
    }

    
}
