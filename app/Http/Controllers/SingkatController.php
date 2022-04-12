<?php

namespace App\Http\Controllers;

use App\NaikTingkat;
use App\Sisya;
use App\tingkat;
use Illuminate\Http\Request;

class SingkatController extends Controller
{
    public function index()
    {
        $listNaikTingkat = NaikTingkat::whereStatus(0)
            ->with('sisya', 'tingkat')->get();


        return view('singkat.index', ['listNaikTingkats' => $listNaikTingkat]);
    }

    public function accept(Request $request, NaikTingkat $naikTingkat)
    {
        // $naikTingkat->status = $request['action'];

        $naikTingkat->delete();

        $sisya = Sisya::find($naikTingkat->sisya_id);
        $idNaikTingkat = $naikTingkat->tingkat->naik_tingkat;
        $sisya->tingkat = tingkat::find($idNaikTingkat)->tingkat;

        $sisya->update();

        return redirect()->back()->with('sukses', 'Request berhasil dikirim!');
    }

}
