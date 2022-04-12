<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sisya;
use App\Nabe;

class AktivasiController extends Controller
{
    public function sisya()
    {
        $data_sisya = \App\Sisya::whereStatus(0)->get();
        return view('aktivasi.sisya',['data_sisya' => $data_sisya]);
    }

    public function nabe()
    {
        $data_nabe = \App\Nabe::whereStatus(0)->get();
        return view('aktivasi.nabe',['data_nabe' => $data_nabe]);
    }
    
    public function admin()
    {
        $data_user = \App\User::all();
        return view('aktivasi.admin',['data_user' => $data_user]);
    }

}
