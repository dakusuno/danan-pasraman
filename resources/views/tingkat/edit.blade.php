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
                            <h2 class="panel-title">Edit Data Tingkat</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="/tingkat/{{$tingkat->id}}/update" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group {{$errors->has('tingkat') ? 'has-error' : ''}}">
                                            <label for="tingkat">Tingkat</label>
                                            <input name="tingkat" type="text" class="form-control" id="tingkat"
                                                value="{{$tingkat->tingkat}}">
                                                @if($errors->has('tingkat'))
                                                    <span class="help-block">{{$errors->first('tingkat')}}</span>
                                                @endif
                                        </div>
                                        <div>
                                        @if(auth()->user()->role == 'admin')
                                            <input type="submit" class="btn btn-sm btn-warning" value="Update">
                                        @endif
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