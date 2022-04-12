<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Detailsoal;
class SoalImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row){
            if($key >= 2){
                Detailsoal::create([
                    'pertanyaan' => $row[1],
                    'pila' => $row[2],
                    'pilb' => $row[3],
                    'pilc' => $row[4],
                    'pild' => $row[5],
                    'kunci' => $row[6],
                    'score' => $row[7],
                    'status' => $row[8],
                    'sesi' => ' ',
                ]);
            }
        }
        
    }
}
