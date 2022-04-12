<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NaikTingkat extends Model
{

    protected $table ="naik_tingkat";

    protected $fillable =['id','sisya_id','tingkat_id','status','created_at','updated_at'];

    public function sisya()
    {
        return $this->hasOne(Sisya::class,'id','sisya_id');
    }
    public function tingkat()
    {
        return $this->hasOne(tingkat::class, 'naik_tingkat', 'asal_tingkat_id');
    }
    public function naikTingkat()
    {
        return $this->hasOne(tingkat::class, 'naik_tingkat', 'naik_tingkat_id');
    }
}
