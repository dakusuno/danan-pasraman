<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nabe extends Model
{
    protected $table ="nabe";
    protected $fillable =['nama','hp','alamat','avatar','user_id'];

    public function mapel()//relasi one to many dngn mapel
    {
        return $this->hasMany(Mapel::class);
    }

    public function detailkelas()//relasi one to many dengan kelas
    {
        return $this->hasMany(Detailkelas::class);
    }

    public function getAvatar()
    {
        if(!$this->avatar){
                return asset('images/default.jpg');
            }
            return asset('images/'.$this->avatar);
        }

    public function kelas()//relasi one to many dengan kelas
    {
        return $this->hasMany(Kelas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['avatar' => 'default.jpg']);
    }
}

