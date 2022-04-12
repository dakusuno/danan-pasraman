<?php

namespace App\Http\Controllers;
use App\Mapel;
use App\Kelas;
use App\Nabe;
use App\Tingkat;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all(); 
        $tingkat = Tingkat::all(); 
        $data_nabe = Nabe::all();
        return view('mapel.create',(['mapel' => $mapel,'tingkat'=> $tingkat, 'data_nabe'=>$data_nabe]));
    }

    public function create(Request $request)
    {
        
        $mapel = new \App\Mapel;
        $mapel->kode = $request->kode;
        $mapel->nama = $request->nama;
        $mapel->deskripsi = $request->deskripsi;
        $mapel->tingkat_id = $request->tingkat_id;
        $mapel->nabe_id = $request->nabe_id;
        $mapel->save();
        return redirect()->route('mapel.index')->with('sukses','Data berhasil diinput!');

        
    }

    public function edit($id)
    {
        $mapel = Mapel::find($id);
        $tingkat = Tingkat::all();
        $data_nabe = Nabe::all();
        return view('mapel/edit',['mapel' => $mapel,'tingkat' =>$tingkat,'data_nabe'=>$data_nabe]);
    }

    public function update(Request $request,$id)
    {
       
        $mapel = \App\Mapel::find($id);
        $mapel->update($request->all());
        return redirect('/mapel')->with('sukses','Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $mapel = \App\Mapel::find($id);
        $mapel->delete($mapel);
        return redirect('/mapel')->with('sukses','Data berhasil dihapus!');
    }

    public function add()
    {
        $mapel = Mapel::all(); 
        $tingkat = Tingkat::all(); 
        $data_nabe = Nabe::all();
        return view('mapel.add',(['mapel' => $mapel,'tingkat'=> $tingkat, 'data_nabe'=>$data_nabe]));
    }
}
