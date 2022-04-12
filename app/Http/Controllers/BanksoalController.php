<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banksoal;
use App\Mapel;
use App\Materi;
use DB;

class BanksoalController extends Controller
{
    public function index()
    {
        $banksoal = Banksoal::groupBy('materi_id')->get(['materi_id']);
     
        $mapels = Mapel::all();
        $materis = Materi::all();
        return view('banksoal.index',['banksoal' => $banksoal, 'materis' => $materis, 'mapels'=>$mapels]);
        
    }

    public function requestMateri($mapelId){
        $data['data'] = Materi::whereMapelId($mapelId)->get();

        echo json_encode($data);
        exit;
    }


    public function create(Request $request)
    {   
        $banksoal = new \App\Banksoal;
        $banksoal->materi_id = $request->materi_id;
        $banksoal->mapel_id = $request->mapel_id;
        $banksoal->pertanyaan = $request->pertanyaan;
        $banksoal->pila = $request->pila;
        $banksoal->pilb = $request->pilb;
        $banksoal->pilc = $request->pilc;
        $banksoal->pild = $request->pild;
        $banksoal->kunci = $request->kunci;
        $banksoal->save();

        return redirect()->back()->with('sukses','Data berhasil diinput!');
    }

    public function show()
    {
        $banksoal = Banksoal::whereMateriId(request()->materi_id)->get();
        $materis = Materi::find(request()->materi_id)->get();
        return view('/banksoal/create',['banksoal' => $banksoal, 'materis' => $materis]);
    }

    public function edit($id)
    {   
        $materis = Materi::all();
        $banksoal = \App\Banksoal::find($id);
        return view('banksoal/edit',['banksoal' => $banksoal,'materis' => $materis]);
    }

    public function update(Request $request,$id)
    {
        $banksoal = \App\Banksoal::find($id);
        $banksoal->update($request->all());
        return redirect()->back()->with('sukses','Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $banksoal = Banksoal::find($id);
        $banksoal->delete();
        return redirect()->back()->with('sukses','Data berhasil dihapus!');
    }
}