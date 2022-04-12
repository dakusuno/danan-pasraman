<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index',compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $buku = Buku::create([
            'kode' => $request->kode,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->route('buku.index')->with('sukses','Data berhasil diinput!');

        
    }

    public function edit($id)
    {
        $buku = \App\Buku::find($id);
        return view('buku/edit',['buku' => $buku]);
    }

    public function update(Request $request,$id)
    {
        $buku = \App\Buku::find($id);
        $buku->update($request->all());
        return redirect('/buku')->with('sukses','Data berhasil diupdate!');
        
    }

    public function delete($id)
    {
        $buku = \App\Buku::find($id);
        $buku->delete($buku);
        return redirect()->route('buku.index')->with('sukses','Data berhasil dihapus!');
    }
}
