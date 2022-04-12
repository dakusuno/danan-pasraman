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
                            <h2 class="panel-title">Edit Forum</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('forum.update',$forum->id)}}" method="POST"
                                        enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <div class="form-row">
                                            <div class="form-group {{$errors->has('title') ? ' has-error' : ''}}">
                                                <label for="title">Judul</label>
                                                <input name="title" type="text" class="form-control" id="title"
                                                    value="{{$forum->title}}">
                                                @if($errors->has('title'))
                                                <span class="help-block">{{$errors->first('title')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('deskripsi') ? ' has-error' : ''}}">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" type="textara" class="form-control"
                                                    id="deskripsi"
                                                    placeholder="Deskripsi">{{$forum->deskripsi}}</textarea>
                                                @if($errors->has('deskripsi'))
                                                <span class="help-block">{{$errors->first('deskripsi')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select name="tags[]" multiple="multiple" id="tc_input"
                                                class="form-control js-example-basic-multiple" id="">
                                                @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <a data-toggle="collapse" data-target="#edit_image"><i class="fa fa-image"
                                                id="upload_image"></i></a>
                                        <div id="edit_image" class="collapse">
                                            <div class="bg">
                                                <div class="form-group {{$errors->has('image') ? ' has-error' : ''}}">
                                                    <input type="file" class="form-control" name="image"
                                                        placeholder="image" style="background-color: #f5f8fa;">
                                                @if($errors->has('image'))
                                                <span class="help-block">{{$errors->first('image')}}</span>
                                                @endif
                                                </div>
                                            </div>
                                            @if(empty($forum->image))
                                                <small><i class="fa fa-info-circle"></i>Postingan ini tidak memiliki gambar.</small>
                                            @else
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <img src="{{asset('images/'.$forum->image)}}" alt="" width="100%">
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-warning">Update</button>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title"> <i class="fa fa-info-circle"></i> Informasi</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="create_info">
                                        <span>Klik icon <strong>Gambar</strong> untuk mengupload gambar atau
                                            screenshot.</span>
                                    </div><br>
                                    <table class="table">
                                        <thead>
                                            <b>Pertanyaan terakhir edit:</b><br>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <h5 style="margin-top: 4px;"><i class="fa fa-newspaper-o"></i>
                                                            {{$forum->title}}
                                                        </h5>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
    $(document).ready(function () {
        $(".js-example-basic-multiple").select2()
            .val({!!json_encode($forum -> tags() -> allRelatedIds())!!}).trigger('change');
    })
</script>
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