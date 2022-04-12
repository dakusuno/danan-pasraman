<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Materi extends Model implements ViewableContract
{
    use Viewable;
    
    protected $table = 'materi';
    protected $fillable = ['user_id','mapel_id','judul','isi','file'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function banksoal()
    {
        return $this->hasMany(Banksoal::class);
    }

    public function mapel() //relasi one to many dngn kelas 
    {
        return $this->belongsTo(Mapel::class);
    }
   
}
