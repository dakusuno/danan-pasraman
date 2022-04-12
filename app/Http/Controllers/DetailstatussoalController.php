<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detailstatussoal;

class DetailstatussoalController extends Controller
{
    public function store(Request $request, $id)
    {
    
        $i = 0;
        foreach($request['detailsoal'] as $item){
            $status = 0;

            if($request->has('statussoal.'.$i)){
                $status = 1;
            }
            
            $detailstatussoal = Detailstatussoal::updateOrCreate([
                'soal_id' => $id,
                'banksoal_id' => $item
            ],[
                'soal_id' => $id,
                'banksoal_id' => $item,
                'status' => $status
            ]);
           

            $i++;
        }

        return back()->with('sukses','Berhasil disimpan');
    }
}
