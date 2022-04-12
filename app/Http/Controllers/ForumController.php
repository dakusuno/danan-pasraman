<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Tag;
use Illuminate\Http\Request;
use Auth;
use DB;
use Storage;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $table = 'forums';
    protected $fillable = ['id','user_id','title','slug','deskripsi','image','created_at','update_at'];

    public function cobadesign()
    {
        return view('forum.cobadesign');
    }

    public function index()
    {
        $tags = Tag::all();
        $populars = DB::table('forums')
        ->join('views','forums.id','=','views.viewable_id')
        ->select(DB::raw('count(viewable_id) as count'),'forums.id','forums.title','forums.slug')
        ->groupBy('id','title','slug')
        ->orderBy('count','desc')
        ->take(5)
        ->get();

        $forums = Forum::paginate(10);
        return view('forum.index',compact('forums','populars','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $forums = Forum::orderBy('id','desc')->paginate(1);
        $tags = Tag::all();
        return view('forum.create',compact('tags','forums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ //validate 
            'title' => 'required|min:5',
            'deskripsi' => 'required|min:50',
            'image' => 'mimes:jpg,png',
        ]);

        $forums = New Forum;
        $forums->user_id = Auth::user()->id;
        $forums->title = $request->title;
        $forums->slug = str_slug($request->title);
        $forums->deskripsi = $request->deskripsi;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $location = public_path('/images');
            $file->move($location, $filename);
            $forums->image =$filename;
        }
        $forums->save();
        $forums->tags()->sync($request->tags);
        return back()->with('sukses','Pertanyaan berhasil dikirim!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $populars = DB::table('forums')
        ->join('views','forums.id','=','views.viewable_id')
        ->select(DB::raw('count(viewable_id) as count'),'forums.id','forums.title','forums.slug')
        ->groupBy('id','title','slug')
        ->orderBy('count','desc')
        ->take(5)
        ->get();

        $forums = Forum::where('id',$slug)->orWhere('slug',$slug)->firstOrFail();
        views($forums)->record(); 
        return view('forum.show',compact('forums','populars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        
        $tags = Tag::all();
        $forum = Forum::where('id',$slug)->orWhere('slug',$slug)->firstOrFail();
        return view('forum.edit', compact('forum','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[ //validate 
            'title' => 'required|min:5',
            'deskripsi' => 'required|min:50',
            'image' => 'mimes:jpg,png',
        ]);

        $forums = Forum::find($id);
        $forums->user_id = Auth::user()->id;
        $forums->title = $request->title;
        $forums->slug = str_slug($request->title);
        $forums->deskripsi = $request->deskripsi;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $location = public_path('/images');
            $file->move($location, $filename);

            $oldImage = $forums->image;
            \Storage::delete($oldImage);

            $forums->image =$filename;
        }
        $forums->save();
        $forums->tags()->sync($request->tags);
        return back()->with('sukses','Pertanyaan berhasil diupdate!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $forum = Forum::where('id',$slug)->orWhere('slug',$slug)->firstOrFail();
        Storage::delete($forum->image);
        $forum->tags()->detach();
        $forum->delete();
        return back()->with('sukses','Pertanyaan berhasil dihapus!'); 
    }
}
