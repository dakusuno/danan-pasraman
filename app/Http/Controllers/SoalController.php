<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SoalExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Soal;
use App\Materi;
use App\Mapel;
use App\Detailsoal;
use App\Banksoal;
use App\Detailstatussoal;
use App\Jawaban;
use Auth;
use Redirect;
class SoalController extends Controller
{
    public function index()
    {
        $soals = Soal::all();
        $materis = Materi::all();
        $mapels = Mapel::all();
        return view('soal.create',['soals' => $soals,'materis' =>$materis, 'mapels' => $mapels]);
        
    }

    public function create(Request $request)
    {
        
        $soal = new \App\Soal;
        $soal->user_id = $request->user()->id;
        if($request->jenis == 0){
            $soal->materi_id = $request->materi_id;
        }else{
            $soal->mapel_id = $request->mapel_id;
        }
        $soal->deskripsi = $request->deskripsi;
        $soal->kkm = $request->kkm;
        $soal->jenis = $request->jenis;

        $soal->save();



        return redirect()->route('soal.create')->with('sukses','Data berhasil diinput!');
    }

    public function edit($id)
    {
        $soal = \App\Soal::find($id);
        $materis = \App\Materi::all();
        
        return view('soal/edit',['soal' => $soal,'materis' => $materis]);
    }

    public function update(Request $request,$id)
    {
        $soal = \App\Soal::find($id);
        $soal->update($request->all());
        return redirect('/soal')->with('sukses','Data berhasil diupdate!');
    }

    public function show($id)
    {

        $soal = \App\Soal::find($id);
        if($soal->materi_id != null){
            $banksoal = Banksoal::whereMateriId($soal->materi_id)->get();
        }else{
            $banksoal = Banksoal::whereMapelId($soal->mapel_id)->get();
        }
        $detailsoals = \App\Detailsoal::whereSoalId($id)->get();
        $detailstatussoal = \App\Detailstatussoal::whereSoalId($id)->get();

        return view('soal.detail',['soal' => $soal, 'detailsoals' => $detailsoals, 'banksoal' => $banksoal, 'detailstatussoal' => $detailstatussoal]);
    }

    public function delete($id)
    {
        $soal = \App\Soal::find($id);
        $soal->delete($soal);
        return redirect()->route('soal.create')->with('sukses','Data berhasil dihapus!');
    }

    public function createDetail(Request $request)
    {
        
        $detailsoals = new \App\Detailsoal;
        $detailsoals->pertanyaan = $request->pertanyaan;
        $detailsoals->pila = $request->pila;
        $detailsoals->pilb = $request->pilb;
        $detailsoals->pilc = $request->pilc;
        $detailsoals->pild = $request->pild;
        $detailsoals->soal_id = $request->soal_id;
        $detailsoals->kunci = $request->kunci;
        $detailsoals->score = $request->score;
        $detailsoals->status = $request->status;

        $detailsoals->save();

        return redirect()->back()->with('sukses','Data berhasil diinput!');
    }
    
    public function detailEdit($id)
    {
        $detailsoals = \App\Detailsoal::find($id);
        return view('soal.detailEdit',['detailsoals' => $detailsoals]);
    }

    public function detailUpdate(Request $request,$id)
    {
        $detailsoals = \App\Detailsoal::find($id);
        $detailsoals->update($request->all());
        return redirect('soal/'.$detailsoals->soal_id)->with('sukses','Data berhasil diupdate!');
        
    }

    public function detailView($id)
    {
        $detailsoals = \App\Detailsoal::find($id);
        return view('soal.detailView',['detailsoals' => $detailsoals]);
    }

    public function detailDelete($id)
    {
        $detailsoals = \App\Detailsoal::find($id);
        $detailsoals->delete($detailsoals);
        return redirect()->back()->with('sukses','Data berhasil dihapus!');
    }

    public function export()
    {
        return Excel::download(new SoalExport, 'Format Soal');
    }

    public function importexcel(Request $request)
    {
        Excel::import(new \App\Imports\SoalImport, $request->file('data_soal'));
        return redirect()->back()->with('sukses','Data berhasil diimport!');
        // dd($request->all());
    }

    public function view($id)
    {
        $soal = \App\Soal::find($id);
        $detailsoals = \App\Detailsoal::whereSoalId($id)->get();
        return view('soal/view',['soal' => $soal, 'detailsoals' => $detailsoals]);
       
    }

    public function jawab($request)
    {
        print_r($request);
    }

    public function showSoal($id)
    {
        $detsol = \App\Soal::find($id);

        $jawaban = Jawaban::where('user_id',Auth::user()->id)->where('soal_id',$id)->get();
        $soal = Detailstatussoal::join('banksoal','banksoal.id','detailstatussoal.banksoal_id')
        ->join('materi','materi.id','banksoal.materi_id')
        ->where('soal_id',$id)
        ->where('detailstatussoal.status','1'
        )->get();  


        if(count($jawaban) > 0){
            return redirect("/sisya/".$soal[0]->mapel_id.'/showMateri'); 
        }
        return view('sisya.showSoal',['soal' => $soal,'detsol'=>$detsol]);
    }


}
