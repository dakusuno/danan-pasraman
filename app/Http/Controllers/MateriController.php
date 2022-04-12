<?php

namespace App\Http\Controllers;
use App\Materi;
use App\Mapel;
use App\Soal;
use App\Banksoal;
use App\Detailstatussoal;
use App\Detailsoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::all();  
        
        $data_mapel = Mapel::all();

        return view('materi.create',(['materis' => $materis,'data_mapel'=>$data_mapel]));
        
    }

    public function create(Request $request)
    {

        $this->validate($request,[ //validate 
            'mapel_id' => 'required',
            'judul' => 'required|min:5',
            'isi' => 'required|min:50',
            'file' => 'required|file|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,mkv,jpeg,png,jpg|max:305000',
        ]);

        $file = $request->file('file');

        $nama_file = time()."_".$file->getClientOriginalName();
        
      	        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'videos';
        $file->storeAs($tujuan_upload, $nama_file,'public');

        $materi = new \App\Materi;
        $materi->user_id = $request->user()->id;
        $materi->mapel_id = $request->mapel_id;
        $materi->judul = $request->judul;
        $materi->isi = $request->isi;
        $materi->status = "tampil";
        $materi->file = $nama_file;

        
        $materi->save();
        
        
        return redirect()->route('materi.index')->with('sukses','Data berhasil diinput!');
    }

    public function edit($id)
    {
        $materi = \App\Materi::find($id);
        $data_mapel = Mapel::all();
        return view('materi/edit',['materi' => $materi,'data_mapel' =>$data_mapel]);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[ //validate 
            'mapel_id' => 'required',
            'judul' => 'required|min:5',
            'isi' => 'required|min:50',
            
        ]);
        
        $file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'videos';
		$file->move($tujuan_upload,$nama_file);
        $materi = \App\Materi::find($id);
        $materi->user_id = $request->user()->id;
        $materi->mapel_id = $request->mapel_id;
        $materi->judul = $request->judul;
        $materi->isi = $request->isi;
        $materi->status = $request->status;
        $materi->file = $nama_file;
        $materi->update();
        return redirect('/materi')->with('sukses','Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $materi = \App\Materi::find($id);
        $materi->delete($materi);
        return redirect('/materi')->with('sukses','Data berhasil dihapus!');
    }
    
    public function show($id)
    {
        

        $materi = Materi::find($id);
        views($materi)->record();
        return view('materi/show',['materi'=>$materi,]);  
    }

    public function showMateri($id)
    {
        $soal = Soal::all();
        $ids = collect();
        $materi = Materi::where('mapel_id',$id)->where('status','Tampil')->get();
        $data_mapel = Mapel::find($id);
        $soals = Soal::whereMapelId($id)->get();

        foreach($materi as $mt){
            $ids->push($mt->id);
        }
        $soalMateri = Soal::whereIn('materi_id',$ids)->get();


        return view('sisya.showMateri',(['materi' => $materi,'data_mapel'=>$data_mapel,'soal'=>$soals,'soalMateri' => $soalMateri]));
        
    }

    
}
