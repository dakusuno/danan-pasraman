<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sisya extends Model
{
    protected $table = 'sisya';
    protected $fillable = ['nik_bapak','pekerjaan_bapak','nama_bapak','nohp_bapak',
                          'nik_ibu','pekerjaan_ibu','nama_ibu','nohp_ibu',
                          'avatar','alamat','kabupaten','provinsi','tingkat','user_id'];

    public function getAvatar() //fungsi apabila avatar belum diupload
    {
        if(!$this->avatar){
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function totalNilai() //total nilai
    {
        $total = 0;
        $hitung = 0;
        foreach($this->mapel as $mapel){
            $total += $mapel->pivot->nilai;
            $hitung++;
        }
        if ($hitung == 0) {
            return 0;
        }   
        else{
            return round($total/$hitung);
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['avatar' => 'default.jpg']);
    }

    public function forum()
    {
        return $this->hasMany(Forum::class);
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class,'detailkelas');
    }

    public function detailkelas()
    {
        return $this->belongsTo(Detailkelas::class);
    }

    
}
