<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banksoal extends Model
{
    protected $table = "banksoal";
    protected $fillable = ['materi_id','pertanyaan','pila','pilb','pilc','pild','kunci'];

    public function materi() //relasi one to many dngn nabe 
    {
        return $this->belongsTo(Materi::class);
    }

    public function detailsoal()
    {
        return $this->belongsTo(Detailsoal::class);
    }

    public function mapel() //relasi one to many dngn nabe 
    {
        return $this->belongsTo(Mapel::class);
    }
}
