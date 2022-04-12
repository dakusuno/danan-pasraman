<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['tingkat_id','kelas'];

    

    public function detailkelas()
    {
        return $this->hasMany(Detailkelas::class);
    }

    public function sisya()
    {
        return $this->belongsToMany(Sisya::class,'detailkelas');
    }

    public function tingkat()
    {
        return $this->belongsTo(Tingkat::class);
    }

    public function nabe()
    {
        return $this->belongsTo(Nabe::class);
    }
}
