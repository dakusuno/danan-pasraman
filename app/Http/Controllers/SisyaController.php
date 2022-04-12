<?php

namespace App\Http\Controllers;

use App\Exports\SisyaExport;
use App\Forum;
use App\Kelas;
use App\Sisya;
use App\NaikTingkat;
use App\Tingkat;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SisyaController extends Controller
{
    
    public function index(Request $request) //menampilkan seluruh data sisya

    {
        if ($request->has('cari')) { //fungsi search
            $data_sisya = \App\Sisya::where('nama_bapak', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        } else {
            $data_sisya = \App\Sisya::all();
        }
        $data_tingkat = \App\Tingkat::all();
        return view('sisya.index', ['data_sisya' => $data_sisya, 'data_tingkat' => $data_tingkat]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [ //validate
            'pekerjaan_bapak' => 'required|min:3',
            'nama_bapak' => 'required|min:5',
            'username' => 'required',
            'alamat' => 'required|min:10',
            
        ]);

        //insert table users
        $user = new \App\User;
        $user->role = 'sisya';
        $user->name = $request->nama_bapak;
        $user->username = $request->username;
        $user->password = bcrypt('123');
        $user->save();

        // insert ke table sisya
        $request->request->add(['user_id' => $user->id]);

        $sisya = \App\Sisya::create($request->all());
        return redirect('/sisya')->with('sukses', 'Data berhasil diinput!');

    }

    public function edit(Sisya $sisya) //fungsi edit profile pd dashboard

    {

        return view('sisya/edit', ['sisya' => $sisya]);
    }

    public function update(Request $request, Sisya $sisya) //update data sisya

    {
        $this->validate($request, [ //validate
            'pekerjaan_bapak' => 'required|min:2',
            'nama_bapak' => 'required|min:5',
            'alamat' => 'required|min:10',
            'kabupaten' => 'required|min:5',
            'provinsi' => 'required|min:3',
            'tingkat' => 'required',
        ]);

        $sisya->status = $request->status;

        $sisya->update($request->all());
        if ($request->hasFile('avatar')) { //fungsi avatar, dan penamaanya
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $sisya->avatar = $request->file('avatar')->getClientOriginalName();
            $sisya->save();
        }
        return redirect()->back()->with('sukses', 'Request berhasil diupdate!');
    }

    public function delete(Sisya $sisya) //delete sisya

    {
        $sisya->delete();
        return redirect('/sisya')->with('sukses', 'Data barhasil dihapus!');
    }

    public function profile(Sisya $sisya)
    {
        //fungsi membawa ke menu profile
        $tingkat = \App\tingkat::whereTingkat($sisya->tingkat)->first();
        $matapelajaran = \App\Mapel::whereTingkatId($tingkat->id)->get();

        $kelas = Kelas::all()->first();
        //menyiapkan data untuk chart
        $categories = [];
        $data = [];
        
        foreach (\App\Mapel::all() as $mp) {
            if ($sisya->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                
                $categories[] = $mp->nama;

                $data[] = $sisya->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }

        $tingkat = \App\Tingkat::whereTingkat($sisya->tingkat)->first();


        $tingkat_selanjutnya = \App\Tingkat::find($tingkat->naik_tingkat);
        
        return view('sisya.profile', ['sisya' => $sisya, 'matapelajaran' => $matapelajaran,
            'categories' => $categories, 'data' => $data, 'kelas' => $kelas, 'tingkat_selanjutnya' => $tingkat_selanjutnya, 'tingkat' => $tingkat]);
    }

    public function addnilai(Request $request, $idsisya) //add nilai diprofile

    {
        $sisya = Sisya::find($idsisya);
        if ($sisya->mapel()->where('mapel_id', $request->mapel)->exists()) {
            return redirect('sisya/' . $idsisya . '/profile')->with('error', 'Nilai matapelajaran sudah ada!');
        }
        $sisya->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        return redirect('sisya/' . $idsisya . '/profile')->with('sukses', 'Data berhasil diinput!');
    }

    public function deletenilai($idsisya, $idmapel) //delete nilai matapelajaran

    {
        $sisya = Sisya::find($idsisya);
        $sisya->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses', 'Data berhasil dihapus!');
    }

    public function exportExcel() //fungsi export excel

    {
        return Excel::download(new SisyaExport, 'sisya.xlsx');
    }

    public function exportPDF()
    {
        $sisya = Sisya::all();
        $pdf = PDF::loadView('export.sisyapdf', ['sisya' => $sisya]);
        $pdf->setPaper('A3', 'landscape');

        return $pdf->download('sisya.pdf');
    }

    public function profilesaya(Sisya $sisya, User $user)
    {
        $matapelajaran = \App\Mapel::all();
        
        $kelas = Kelas::all()->first();
        //menyiapkan data untuk chart
        $categories = [];
        $data = [];
        foreach ($matapelajaran as $mp) {
            if ($sisya->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                $data[] = $sisya->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }
        $sisya = auth()->user()->sisya;
        $tingkat = \App\Tingkat::whereTingkat($sisya->tingkat)->first();
        $tingkat_selanjutnya = \App\Tingkat::find($tingkat->naik_tingkat);
        return view ('sisya.profilesaya', 
                    ['sisya'        => $sisya,      'matapelajaran'         => $matapelajaran,
                    'categories'    => $categories, 'data'                  => $data, 
                    'kelas'         => $kelas,      'tingkat_selanjutnya'   => $tingkat_selanjutnya, 
                    'tingkat'       => $tingkat]);
    }
  

    public function importexcel(Request $request)
    {
        Excel::import(new \App\Imports\SisyaImport, $request->file('data_sisya'));
        return redirect('/sisya')->with('sukses', 'Data berhasil diimport!');
    }

    public function requestNaikTingkat(Request $request)
    {
        $naikTingkat = new NaikTingkat();

        $tingkat = \App\tingkat::find($request['tingkat_id']);

        $naikTingkat->sisya_id = $request['id'];
        $naikTingkat->asal_tingkat_id = $tingkat->id;
        $naikTingkat->naik_tingkat_id = $tingkat->naik_tingkat;
        $naikTingkat->status = 0;

        $naikTingkat->save();

        return redirect()->back()->with('sukses', 'Request berhasil dikirim!');
    }

    public function editprofilesisya()
    {
        return view('sisya.editprofilesisya');
    }
}
