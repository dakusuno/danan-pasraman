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
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Edit Event</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="/kegiatan/{{$kegiatan->id}}/update" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-row">
                                            <div class="form-group {{$errors->has('judul') ? ' has-error' : ''}}">
                                                <label for="judul">Judul</label>
                                                <input name="judul" type="text" class="form-control"
                                                    placeholder="Judul" value="{{$kegiatan->judul}}">
                                                @if($errors->has('judul'))
                                                <span class="help-block">{{$errors->first('judul')}}</span>
                                                @endif
                                            </div>

                                            <div class="form-group {{$errors->has('deskripsi') ? ' has-error' : ''}}">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" type="textara" class="form-control"
                                                    id="deskripsi" placeholder="Deskripsi Kegiatan">{{$kegiatan->deskripsi}}</textarea>
                                                @if($errors->has('deskripsi'))
                                                <span class="help-block">{{$errors->first('deskripsi')}}</span>
                                                @endif
                                            </div>

                                            <div
                                                class="form-group col-md-6 {{$errors->has('tanggal_mulai') ? ' has-error' : ''}}">
                                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                                <input name="tanggal_mulai" type="date" class="form-control"
                                                    id="tanggal_mulai">{{$kegiatan->tanggal_mulai}}</textarea>
                                                @if($errors->has('tanggal_mulai'))
                                                <span class="help-block">{{$errors->first('tanggal_mulai')}}</span>
                                                @endif
                                            </div>
                                            <div
                                                class="form-group col-md-6 {{$errors->has('tanggal_akhir') ? ' has-error' : ''}}">
                                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                                <input name="tanggal_akhir" type="date" class="form-control"
                                                    id="tanggal_akhir">{{$kegiatan->tanggal_akhir}}</textarea>
                                                @if($errors->has('tanggal_akhir'))
                                                <span class="help-block">{{$errors->first('tanggal_akhir')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group {{$errors->has('tempat') ? ' has-error' : ''}}">
                                        <label for="tempat">Tempat</label>
                                        <input name="tempat" type="text" class="form-control" id="tempat"
                                            placeholder="Tempat Kegiatan" value="{{$kegiatan->tempat}}">
                                        @if($errors->has('tempat'))
                                        <span class="help-block">{{$errors->first('tempat')}}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{$errors->has('jalan') ? ' has-error' : ''}}">
                                        <label for="jalan">Jalan</label>
                                        <input name="jalan" type="text" class="form-control" id="jalan"
                                            placeholder="Jalan Kegiatan" value="{{$kegiatan->jalan}}">
                                        @if($errors->has('jalan'))
                                        <span class="help-block">{{$errors->first('jalan')}}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{$errors->has('kota') ? ' has-error' : ''}}">
                                        <label for="kota">Kota</label>
                                        <input name="kota" type="text" class="form-control" id="kota"
                                            placeholder="Kota Kegiatan" value="{{$kegiatan->kota}}">
                                        @if($errors->has('kota'))
                                        <span class="help-block">{{$errors->first('kota')}}</span>
                                        @endif
                                    </div>
                                    <br>
                                    
                                    <div class="input-group ">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="thumbnail"
                                            value="{{$kegiatan->thumbnail}}">

                                    </div>

                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                    <div class="input-group">
                                        <input type="submit" class="btn btn-warning" value="Update">
                                    </div>
                                    </form>
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
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'))
        .catch(error => {
            console.error(error);
        });

    $(document).ready(function () {
        $('#lfm').filemanager('image');
    });

</script>
@stop