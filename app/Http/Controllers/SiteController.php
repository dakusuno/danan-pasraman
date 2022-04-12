<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Kegiatan;

class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::all();
        $kegiatan = Kegiatan::all();
        return view ('sites.home',compact(['posts','kegiatan']));
    }
    
    public function register()
    {
        return view ('sites.register');
    }

    public function postregister(Request $request)  
    {
        //insert table users
        $user = new \App\User;
        $user->role ='sisya';
        $user->name = $request->nama_bapak;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $sisya = \App\Sisya::create($request->all());

        return redirect('/')->with('sukses','Data pendaftaran berhasil dikirim! administrasi selanjutnya dapat dilengkapi di Pasraman');
    }

    public function singlepost($slug)
    {
        $post = Post::where('slug','=',$slug)->first();

        $next_id = Post::where('id','>','$post->id')->min('id');
        $prev_id = Post::where('id','<','$post->id')->max('id');


        return view('sites.singlepost',compact(['post']))->with('next', Post::find($next_id))->with('prev', Post::find($prev_id));
    }

    public function gallery()
    {
        return view ('sites.gallery');
    }

    public function tentang()
    {
        return view('sites.tentang');
    }

    public function kontak()
    {
        return view ('sites.kontak');
    }

    public function indexKegiatan()
    {
        return view('sites.indexKegiatan');
    }

    public function viewkeg($id)
    {
        $user = User::whereUsername($username)->firstOrFail();

        // get prev user data
        $prev = User::where('id', '<', $user->id)
            ->orderBy('id', 'DESC')
            ->first();

        // get next user data
        $next = User::where('id', '>', $user->id)
            ->orderBy('id', 'ASC')
            ->first();

        return view('user.view', compact('user', 'next', 'prev'));
    }
}
