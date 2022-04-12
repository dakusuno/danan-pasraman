<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tingkat;
class TingkatController extends Controller
{
    public function index()
    {
        $tingkat = Tingkat::all();
        return view('tingkat.index',['tingkat' => $tingkat]);   
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tingkat = new \App\Tingkat;
        $tingkat->tingkat = $request->tingkat;
        $tingkat->save();
       
        return redirect()->route('tingkat.index')->with('sukses','Data berhasil diinput!');

       
    }

    public function edit($id)
    {
        $tingkat = \App\Tingkat::find($id);
        return view('tingkat/edit',['tingkat' => $tingkat]);
    }

    public function update(Request $request,$id)
    {
        $tingkat = \App\Tingkat::find($id);
        $tingkat->update($request->all());
        return redirect('/tingkat')->with('sukses','Data berhasil diupdate!');
        
    }

    public function delete($id)
    {
        $tingkat = \App\Tingkat::find($id);
        $tingkat->delete($tingkat);
        return redirect()->route('tingkat.index')->with('sukses','Data berhasil dihapus!');
    }
}
