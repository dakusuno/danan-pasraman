<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailsoal extends Model
{
    protected $table = "detailsoals";
    protected $fillable = ['soal_id','pertanyaan','audio','pila','pilb','pilc','pild','kunci','score','status','sesi'];

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }

    public function banksoal()
    {
        return $this->hasMany(Banksoal::class);
    }
}
