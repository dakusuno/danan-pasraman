<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email', 'password','active','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    //old 
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function sisya()
    {
        return $this->hasOne(Sisya::class);
    }

    public function nabe()
    {
        return $this->hasOne(Nabe::class);
    }

    public function forum()
    {
        return $this->hasMany(Forum::class);
    }

    public function materis()
    {
        return $this->hasMany(Materi::class);
    }

    public function soals()
    {
        return $this->hasMany(Soal::class);
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
