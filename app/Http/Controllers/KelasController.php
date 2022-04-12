<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Nabe;
use App\Tingkat;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data_kelas = \App\Kelas::all();
        $data_nabe = \App\Nabe::all();
        $tingkat = \App\Tingkat::all();
        return view('kelas.create', ['data_kelas' => $data_kelas, 'data_nabe' => $data_nabe, 'tingkat' => $tingkat]);
    }

    public function create(Request $request)
    {

        $data_kelas = new \App\Kelas;
        $data_kelas->nabe_id = $request->nabe_id;
        $data_kelas->tingkat_id = $request->tingkat_id;
        $data_kelas->kelas = $request->kelas;
        $data_kelas->save();

        return redirect()->back()->with('sukses', 'Data berhasil diinput!');
    }

    public function edit($id)
    {

        $kelas = \App\Kelas::find($id);
        $tingkat = Tingkat::all();
        $data_nabe = \App\Nabe::all();

        return view('kelas/edit', ['kelas' => $kelas, 'data_nabe' => $data_nabe, 'tingkat' => $tingkat]);
    }

    public function update(Request $request, $id)
    {

        $kelas = \App\Kelas::find($id);
        $kelas->update($request->all());
        return redirect('/kelas')->with('sukses', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $kelas = \App\Kelas::find($id);
        $kelas->delete($kelas);
        return redirect('/kelas')->with('sukses', 'Data berhasil dihapus!');
    }

    public function detail($id)
    {
        $data_kelas = \App\Kelas::find($id);
        $data_sisya = \App\Sisya::all();
        $data_nabe = \App\Nabe::all();
        $detailkelas = \App\Detailkelas::whereKelasId($id)->get();

        $a = collect();

        foreach (\App\Detailkelas::all() as $detail) {
            $a->push($detail->sisya_id);
        }
        $sisya = \App\Sisya::whereNotIn('id', $a)->get();

        return view('kelas.detail', ['data_kelas' => $data_kelas, 'data_nabe' => $data_nabe,
            'detailkelas' => $detailkelas, 'data_sisya' => $sisya]);
    }

    public function createDetail(Request $request)
    {

        $detailkelas = new \App\Detailkelas;
        $detailkelas->nabe_id = $request->nabe_id;
        $detailkelas->kelas_id = $request->kelas_id;
        $detailkelas->kode = $request->kode;
        $detailkelas->save();
        return redirect()->back()->with('sukses', 'Data berhasil diinput!');
    }

    public function editDetail($id)
    {
        $detailkelas = App\Detailkelas::find($id);
        $data_nabe = \App\Nabe::all();
        return view('kelas.editDetail', ['detailkelas' => $detailkelas, 'data_nabe' => $data_nabe]);
    }

    public function updateDetail(Request $request, $id)
    {
        $this->validate($request, [
            'tingkat' => 'required|min:5',
        ]);

        $detailkelas = App\Detailkelas::find($id);
        $kelas->update($request->all());
        return redirect('/kelas')->with('sukses', 'Data berhasil diupdate!');
    }

    public function storedetailkelas(Request $request, $id)
    {
        $kelas = \App\Kelas::find($id);

        foreach ($request['sisya'] as $sisya) {
            $detailkelas = new \App\Detailkelas();
            $detailkelas->nabe_id = $kelas->nabe_id;
            $detailkelas->sisya_id = $sisya;
            $detailkelas->kelas_id = $id;
            $detailkelas->save();
        }

        return redirect('/kelas')->with('sukses', 'Data berhasil diupdate!');
    }

    function list($id) {
        $data_kelas = \App\Kelas::find($id);
        $data_sisya = \App\Sisya::all();
        $detailkelas = \App\Detailkelas::where('kelas_id', $id)->get();

        return view('kelas.list', ['data_kelas' => $data_kelas, 'detailkelas' => $detailkelas, 'data_sisya' => $data_sisya]);
    }

    public function deletesisya($id)
    {
        $detailkelas = \App\Detailkelas::find($id);
        $detailkelas->delete($detailkelas);
        return redirect()->back()->with('sukses', 'Data berhasil dihapus!');
    }

}
