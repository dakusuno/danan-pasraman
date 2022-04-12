<?php

namespace App\Http\Controllers;
use App\Materi;
use App\Kegiatan;
use Illuminate\Http\Request;
// use App\Sisya;

class DashboardController extends Controller
{

    //new 
    // public function __construct()
    // {
    //     $this->middleware('web');
    // }

    // public function dashboard()
    // {
    //     return view('dashboard.index');
    // }

    //old
    public function index() //fungsi ranking 5 besar
    {
        $kegiatan = Kegiatan::all();
        
        $sisya = \App\Sisya::whereUserId(auth()->user()->id)->first();
        $naikTingkat = null;
        if($sisya){
            $naikTingkat = \App\NaikTingkat::whereSisyaId($sisya->id)->first();
        }
        

        

        return view('dashboard.index',compact(['kegiatan','naikTingkat'])); 
    }

    public function view()
    {
        $materis = Materi::all(); 
        return redirect()->route('soal.view')->with('sukses','Semoga Sukses');
    }
}
