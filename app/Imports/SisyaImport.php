<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Sisya;

class SisyaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach($collection as $key => $row){
            if($key >= 1){
                Sisya::create([
                    'nama_bapak' => $row[0],
                    'pekerjaan_bapak' => $row[1],
                    'nohp_bapak' => $row[2],
                    'nama_ibu' => $row[3],
                    'pekerjaan_ibu' => $row[4],
                    'nohp_ibu' => $row[5],
                    'alamat' => $row[6],
                    'kabupaten' => $row[7],
                    'provinsi' => $row[8],
                ]);
            }
        }
        
    }
}
