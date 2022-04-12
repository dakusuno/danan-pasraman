<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detailstatussoal;
use App\Jawaban;
use App\Mapel;
use Auth;

class JawabanController extends Controller
{
    
    public function postJawaban(Request $request){
        $benar = 0;
        $status = 0;
        $mapel_id = Mapel::find($request->mapel_id);
        $soal = Detailstatussoal::join('banksoal','banksoal.id','detailstatussoal.banksoal_id')->join('materi','materi.id','banksoal.materi_id')->join('soals','soals.id','detailstatussoal.soal_id')->where('soal_id',$request->soal_id)->where('detailstatussoal.status','1')->get();  
        foreach($soal as $soals){
            $id = $soals->banksoal_id;
            $jawaban = $request->$id;
            $kunci = $soals->kunci;
            if($jawaban == $kunci){
                $benar += 1;
            }
        }
        $totalSoal = count($soal);
        $skor = $benar/ $totalSoal * 100 ;
        $kkm = $soal[0]->kkm;
        if($skor >= $kkm){
            $status = 1;
        } else {
            $status = 2;
        }
        $result = new Jawaban;
        $result->user_id = Auth::user()->id;
        $result->soal_id = $soal[0]->soal_id;
        $result->score = $skor;
        $result->status = $status;
        $result->save();
        return redirect("/sisya/".$mapel_id->id.'/showMateri'); 
        return ["soal"=>$soal,"benar"=>$benar,"total soal"=>$totalSoal,"skor"=>$skor];
    }
}
