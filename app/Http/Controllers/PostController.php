<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact(['posts']));
    }

    public function add()
    {
        return view('posts.add');
    }

    public function create(Request $request)
    {
        $this->validate($request,[ //validate 
            'title' => 'required|min:5',
            'content' => 'required|min:50',
            
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'thumbnail' => $request->thumbnail
        ]);

        return redirect()->route('posts.index')->with('sukses','Post berhasil disubmit!');
    }

    public function delete($id)
    {
        $post = \App\Post::find($id);
        $post->delete($post);
        return redirect('/posts')->with('suksess','Data berhasil dihapus!');
    }

    public function edit($id)
    {
        $post = \App\Post::find($id);
        return view('posts.edit',['post' => $post]);
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[ //validate 
            'title' => 'required|min:5',
            'content' => 'required|min:50',
            
        ]);

        $post = \App\Post::find($id);
        $post->update($request->all());
        return redirect('/posts')->with('sukses','Data berhasil diupdate!');
    }
}
