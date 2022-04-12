<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailkelas extends Model
{
    protected $table = 'detailkelas';
    protected $fillable = ['nabe_id','kelas_id','sisya_id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function nabe() //relasi one to many dngn nabe 
    {
        return $this->belongsTo(Nabe::class);
    }

    public function sisya()
    {
        return $this->belongsTo(Sisya::class);
    }
}
