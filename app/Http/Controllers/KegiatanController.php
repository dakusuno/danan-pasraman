<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\User;

class KegiatanController extends Controller
{
    public function showkegiatan($slug)
    {   
        $kegiatan = Kegiatan::where('slug','=',$slug)->first();
        return view ('sites.showKegiatan',compact(['kegiatan']));
       
    }

    public function index()
    {
        $kegiatans = Kegiatan::all();
        $users = User::all();
        return view ('kegiatan.index',compact(['kegiatans']));
    }

    public function add()
    {
        return view ('kegiatan.add');
    }

    public function create(Request $request)
    {
        // $this->validate($request,[
        //     'judul' => 'required|min:3',
        //     'deskripsi' => 'required|min:50',
        //     'tanggal_mulai' => 'required',
        //     'tanggal_akhir' => 'required',
        //     'tempat' => 'required|min:3',
        //     'jalan' => 'required|min:3',
        //     'kota' => 'required|min:3',
        // ]);

        $kegiatan = Kegiatan::create([
            'judul' => $request->judul,
            'user_id' => auth()->user()->id,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'tempat' => $request->tempat,
            'jalan' => $request->jalan,
            'kota' => $request->kota,
            'thumbnail' => $request->thumbnail,
        ]);

        return redirect()->route('kegiatan.index')->with('sukses','Kegiatan berhasil disubmit!');
    }

    public function delete($id)
    {
        $kegiatan = \App\Kegiatan::find($id);
        $kegiatan->delete($kegiatan);
        return redirect()->back()->with('sukses','Data berhasil dihapus!');
    }

    public function edit($id)
    {
        $kegiatan = \App\Kegiatan::find($id);
        return view('kegiatan.edit',['kegiatan' => $kegiatan]);
    }

    public function update(Request $request,$id)
    {
        $kegiatan = \App\Kegiatan::find($id);
        $kegiatan->update($request->all());
        return redirect()->route('kegiatan.index')->with('sukses','Kegiatan berhasil diupdate!');
    }
    
    public function next($id)
    {
        $kegiatan = Kegiatan::whereId($id)->firstOrFail();

        // get prev user data
        $prev = Kegiatan::where('id', '<', $kegiatan->id)
            ->orderBy('id', 'DESC')
            ->first();

        // get next user data
        $next = Kegiatan::where('id', '>', $kegiatan->id)
            ->orderBy('id', 'ASC')
            ->first();

        return view('sites.showKegiatan', compact('kegiatan', 'next', 'prev'));
    }
}
