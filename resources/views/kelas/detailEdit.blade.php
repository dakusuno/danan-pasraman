@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            @if(session('sukses'))

            @endif
            @if(session('error'))

            @endif
            <div class="row">
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Edit Detail Kelas</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="/kelas/createDetail" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="hidden" name="kelas_id" id="kelas_id"
                                                value="{{$data_kelas->id}}"></input>
                                            <label for="nabe">Nabe Pengampu</label>
                                            <select name="nabe_id" class="form-control">
                                                @foreach($data_nabe as $nabe)
                                                <option value="{{$nabe->id}}"
                                                    {{$nabe->id == $nabe->nabe_id ? 'selected' : '' }}>{{$nabe->nama}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kode">Kode Kelas</label>
                                            <input name="kode" type="text" class="form-control" id="kode"
                                                placeholder="20xx/0x/Jro Mangku">
                                        </div>
                                        <div>
                                            <input type="submit" class="btn btn-sm btn-success" value="Submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Informasi</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        Daftarkan seluruh kelas malalui halaman ini.
                                        Data kelas diperlukan untuk mengelompokan siswa dan untuk mendistribusian paket
                                        soal.
                                    </p>
                                    <p>
                                        Jika terdapat data kelas yang belum valid atau kelas yang belum terdaftar,
                                        hubungi operator sekolah untuk merubah atau mendaftarkan kelas tersebut.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop