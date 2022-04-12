<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = "soals";
    protected $fillable = ['user_id','mapel_id','materi_id','jenis','paket','deskripsi','kkm','waktu','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailsoal()
    {
        return $this->hasMany(Detailsoal::class);
    }

    public function materi() //relasi one to many dngn nabe 
    {
        return $this->belongsTo(Materi::class);
    }

    public function mapel() //relasi one to many dngn nabe 
    {
        return $this->belongsTo(Mapel::class);
    }
}
