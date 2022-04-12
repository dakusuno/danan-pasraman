<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tingkat;
use App\Sisya;

class LaporanController extends Controller
{
    public function index()
    {
        $data_tingkat = \App\Tingkat::all();
        $data_sisya = \App\Sisya::all();
        return view('laporan.index',['data_tingkat' => $data_tingkat, 'data_sisya' => $data_sisya]);
    }

    public function hasil($id)
    {
        $data_sisya = Sisya::find($id);
        $matapelajaran = \App\Mapel::all();
        $kelas = \App\Kelas::all()->first;

        $categories = [];
        $data = [];
        foreach ($matapelajaran as $mp) {
            if ($data_sisya->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                $data[] = $data_sisya->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }

        return view('laporan.hasil', ['data_sisya' => $data_sisya, 'matapelajaran' => $matapelajaran,
            'categories' => $categories, 'data' => $data, 'kelas' => $kelas]);
    }

    

    

}
