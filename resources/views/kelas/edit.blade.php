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
                            <h2 class="panel-title">Edit Data Kelas</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="/kelas/{{$kelas->id}}/update" method="post">
                                        {{csrf_field()}}
                                            <div class="form-group {{$errors->has('tingkat_id') ? ' has-error' : ''}}">
                                                <label for="tingkat">Tingkat</label>
                                                <select name="tingkat_id"class="form-control">
                                                    @foreach($tingkat as $tk)
                                                        <option value="{{$tk->id}}" 
                                                            @if ($tk->id === $kelas->tingkat_id)
                                                                selected
                                                            @endif
                                                        >{{$tk->tingkat}}</option>
                                                    @endforeach
                                                </select> 
                                                @if($errors->has('tingkat_id'))
                                                <span class="help-block">{{$errors->first('tingkat_id')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('nabe_id') ? ' has-error' : ''}}">
                                                <label for="nabe">Nabe</label>
                                                <select name="nabe_id"class="form-control">
                                                    @foreach($data_nabe as $nabe)
                                                        <option value="{{$nabe->id}}" 
                                                            @if ($nabe->id === $kelas->nabe_id)
                                                                selected
                                                            @endif
                                                            >{{$nabe->nama}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('nabe_id'))
                                                <span class="help-block">{{$errors->first('nabe_id')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('kelas') ? 'has-error' : ''}}">
                                                <label for="kelas">Kelas</label>
                                                <input name="kelas" type="text" class="form-control" id="kelas"
                                                   value="{{$kelas->kelas}}" required>
                                                @if($errors->has('kelas'))
                                                <span class="help-block">{{$errors->first('kelas')}}</span>
                                                @endif
                                            </div>
                                        <div>
                                            <input type="submit" class="btn btn-sm btn-warning" value="Update">
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