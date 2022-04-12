<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    protected $table = 'tingkat';
    protected $fillable =['tingkat'];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }

    public function sisya()
    {
        return $this->belongsToMany(Sisya::class);
    }
    
}
