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
                            <h2 class="panel-title">Edit Data Materi</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                <form action="/materi/{{$materi->id}}/update" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                            <div class="form-group {{$errors->has('mapel_id') ? ' has-error' : ''}}">
                                                <label for="mapel">Mata Pelajaran</label>
                                                <select name="mapel_id"class="form-control">
                                                <option selected disabled>Pilih Mata Pelajaran</option>
                                                    @foreach($data_mapel as $mapel)
                                                        <option value="{{$mapel->id}}" 
                                                            @if ($mapel->id === $materi->mapel_id)
                                                                selected
                                                            @endif
                                                            >{{$mapel->nama}}</option>
                                                    @endforeach
                                                   
                                                </select>
                                                @if($errors->has('mapel_id'))
                                                <span class="help-block">{{$errors->first('mapel_id')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('judul') ? ' has-error' : ''}}">
                                                <label for="judul">Judul</label>
                                                <input name="judul" type="text" class="form-control" id="judul"
                                                    placeholder="Judul" value="{{$materi->judul}}">
                                                @if($errors->has('judul'))
                                                <span class="help-block">{{$errors->first('judul')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('isi') ? ' has-error' : ''}}">
                                                <label for="isi">Isi</label>
                                                <textarea name="isi" id="isi" class="form-control" 
                                                placeholder="Tuliskan Materi" rows="5" >{{$materi->isi}}</textarea>
                                                @if($errors->has('isi'))
                                                <span class="help-block">{{$errors->first('isi')}}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group {{$errors->has('status') ? ' has-error' : ''}}">
                                                <label for="status">Status</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option selected disabled>Pilih Status</option>
                                                        <option value="Tidak Tampil" @if($materi->status == 'Tidak Tampil') selected @endif>Tidak Tampil</option>
                                                        <option value="Tampil" @if ($materi->status == 'Tampil') selected @endif>Tampil</option>
                                                    </select>
                                                @if($errors->has('status'))
                                                <span class="help-block">{{$errors->first('status')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('file') ? ' has-error' : ''}}">
                                            <label for="upload">Upload File</label>
                                                @if(empty($materi->file))
                                                <small><i class="fa fa-info-circle"></i>Postingan ini tidak memiliki file.</small>
                                                @else
                                                    <input type="file" class="form-control" name="file" 
                                                       src="{{asset('videos/'.$materi->file)}}" >
                                                @endif
                                                @if($errors->has('file'))
                                                <span class="help-block">{{$errors->first('file')}}</span>
                                                @endif
                                            </div>
                                            
                                           
                                            <!-- <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="gambar" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input type="text" class="form-control" name="filepath" id="gambar">
                                                </div>
                                            </div> -->
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
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector('#isi'))
            .catch( error => {
                console.error(error);
            });

            $(document).ready(function(){
                $('#lfm').filemanager('image');
            });
    </script>
@stop