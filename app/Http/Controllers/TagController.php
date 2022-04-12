<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Auth;
use DB;
use Storage;
use App\Forum;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $table = 'tags';
    protected $fillable = ['id','name','slug','created_at','update_at'];

    public function index()
    {
        $tags = Tag::all();
        return view('tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $forum = Forum::count();
        return view('tag.create', compact('tags'));
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
            'name' => 'required|min:4',
        ]);

        $tag = New Tag;
        $tag->name = $request->name;
        $tag->slug = str_slug($request->name);
        $tag->save();

        return back()->with('sukses','Tag barhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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

        $tags = Tag::where('id',$slug)
                   ->orWhere('slug',$slug)
                   ->firstOrFail();

        $tagAll = Tag::all();


        return view('tag.show',compact('tags','populars','tagAll'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[ //validate 
            'name' => 'required|min:4',
        ]);

        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->slug = str_slug($request->name);
        $tag->save();

        return redirect()->route('tag.create')->with('sukses','Tag barhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('tag.create')->with('sukses','Tag barhasil terhapus!');
    }
}
