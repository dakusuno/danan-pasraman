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
                            <h2 class="panel-title">Edit Mata Pelajaran</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                        <form action="/mapel/{{$mapel->id}}/update" method="post" >
                                        {{csrf_field()}}
                                            <div class="form-group {{$errors->has('kode') ? ' has-error' : ''}}">
                                                <label for="kode">Kode</label>
                                                <input name="kode" type="text" class="form-control" id="kode"
                                                    value="{{$mapel->kode}}">
                                                @if($errors->has('kode'))
                                                <span class="help-block">{{$errors->first('kode')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('nama') ? ' has-error' : ''}}">
                                                <label for="nama">Nama</label>
                                                <input name="nama" type="text" class="form-control" id="nama"
                                                value="{{$mapel->nama}}">
                                                @if($errors->has('nama'))
                                                <span class="help-block">{{$errors->first('nama')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('deskripsi') ? ' has-error' : ''}}">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Tuliskan Materi" rows="5">{!!$mapel->deskripsi!!}</textarea>
                                                @if($errors->has('deskripsi'))
                                                <span class="help-block">{{$errors->first('deskripsi')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('tingkat_id') ? ' has-error' : ''}}">
                                                <label for="tingkat">Tingkat</label>
                                                <select name="tingkat_id"class="form-control">
                                                    @foreach($tingkat as $tk)
                                                        <option value="{{$tk->id}}" 
                                                            @if ($tk->id === $mapel->tingkat_id)
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
                                                            @if ($nabe->id === $mapel->nabe_id)
                                                                selected
                                                            @endif
                                                            >{{$nabe->nama}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('nabe_id'))
                                                <span class="help-block">{{$errors->first('nabe_id')}}</span>
                                                @endif
                                            </div>
                                            <div>
                                            @if(auth()->user()->role == 'admin')
                                                <input type="button" class="btn btn-sm btn-danger" value="Cancel">
                                                <input type="submit" class="btn btn-sm btn-warning" value="Update">
                                            @endif
                                            </div>
                                        </form>
                                    </div> <br> <br>
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
                                        Tulis Mata Pelajaran sesuai dengan pedoman pasraman untuk dapat diakses oleh sisya.
                                        Semakin banyak pelajaran yang dipublish akan memperkaya konten 
                                        pembelajaran dari apilkasi ini dan bermanfaat untuk para sisya.
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

@section('footer')
    <script>
        $(document).ready( function () {
            $('#tabelMateri').DataTable();
        }); 
    </script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector('#deskripsi'))
            .catch( error => {
                console.error(error);
            });

            $(document).ready(function(){
                $('#lfm').filemanager('image');
            });
    </script>
@stop

