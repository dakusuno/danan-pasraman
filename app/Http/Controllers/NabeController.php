<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nabe;
use App\Kelas;
use App\User;

class NabeController extends Controller
{
    public function profile($id)
    {
        $nabe = Nabe::find($id);
        return view('nabe.profile',['nabe' => $nabe]);
    }

    public function index()
    {
        $data_nabe = \App\Nabe::all(); 
        return view('nabe.create',['data_nabe' => $data_nabe]);
    }

    public function create(Request $request)
    {
        $user = new \App\User;
        $user->role = 'pengunjung';
        $user->name = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt('123');
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $nabe = \App\Nabe::create($request->all());
        return redirect('/nabe')->with('sukses','Data berhasil diinput!');
    }

    public function edit($id)
    {
        $nabe = \App\Nabe::find($id);
        return view('nabe/edit',['nabe' => $nabe]);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama' => 'required|min:5',
            'hp' => 'required|min:12',
            'alamat' => 'required',
            'status' => 'required',
        ]);
       
        $nabe = \App\Nabe::find($id);
        $nabe->status = $request->status;
        $nabe->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $nabe->avatar = $request->file('avatar')->getClientOriginalName();
            $nabe->save();
        }
        return redirect('/nabe')->with('sukses','Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $nabe = \App\Nabe::find($id);
        $nabe->delete($nabe);
        return redirect('/nabe')->with('sukses','Data berhasil dihapus!');
    }

    public function profilenabe()       
    {
        return view('nabe.profilenabe');
    }
}
