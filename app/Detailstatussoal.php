<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailstatussoal extends Model
{
    protected $table= 'detailstatussoal';
    protected $fillable = ['soal_id','banksoal_id','status'];

}
