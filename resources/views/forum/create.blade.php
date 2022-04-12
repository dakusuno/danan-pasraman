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
                            <h2 class="panel-title">Buat Pertanyaan</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('forum.store')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-row">
                                            <div class="form-group {{$errors->has('title') ? ' has-error' : ''}}">
                                                <label for="title">Judul</label>
                                                <input name="title" type="text" class="form-control" id="title"
                                                    placeholder="Judul" value="{{old('title')}}">
                                                @if($errors->has('title'))
                                                <span class="help-block">{{$errors->first('title')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('deskripsi') ? ' has-error' : ''}}">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" type="textara" class="form-control"
                                                    id="deskripsi" placeholder="Deskripsi" value="{{old('deskripsi')}}"></textarea>
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
                                        <a data-toggle="collapse" data-target="#screenshot-open"><i class="fa fa-image"
                                                id="upload_image"></i></a>
                                        <div id="screenshot-open" class="collapse">
                                            <div class="bg">
                                                <div class="form-group {{$errors->has('image') ? ' has-error' : ''}}">
                                                    <input type="file" class="form-control" name="image"
                                                        placeholder="image" style="background-color: #f5f8fa;" value="{{old('image')}}">
                                                @if($errors->has('image'))
                                                <span class="help-block">{{$errors->first('image')}}</span>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-info" value="Submit">
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
                                            <b>Pertanyaan Terakhir Anda:</b><br>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @forelse($forums as $forum)
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
                                                @empty
                                                @endforelse
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <b>Pertanyaan baru akan muncul disini.:</b><br>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @forelse($forums as $forum)
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
                                                @empty
                                                @endforelse
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
        $(".js-example-basic-multiple").select2({
            placeholder: "Pilih tag",
            maximumSelectionLength: 2,
            allowClear: true

        });
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