<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable =['nabe_id','kode','nama','deskripsi','tingkat_id'];
    
    public function sisya ()
    {
        return $this->belongsToMany(Sisya::class)->withPivot(['nilai']);
    }

    public function nabe() //relasi one to many dngn nabe 
    {
        return $this->belongsTo(Nabe::class);
    }

    public function tingkat() //relasi one to many dngn kelas 
    {
        return $this->belongsTo(Tingkat::class);
    }
    
    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
    
    public function soal()
    {
        return $this->hasMany(Soal::class);
    }
    
    public function banksoal()
    {
        return $this->hasMany(Banksoal::class);
    }
}
