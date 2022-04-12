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
                            <h2 class="panel-title">Add New Posts</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="{{route('posts.create')}}" method="POST" enctype="multipart/form-data">
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

                                            <div class="form-group {{$errors->has('content') ? ' has-error' : ''}}">
                                                <label for="content">Content</label>
                                                <textarea name="content" type="textara" class="form-control"
                                                    id="content" placeholder="Content">{{old('content')}}</textarea>
                                                @if($errors->has('content'))
                                                <span class="help-block">{{$errors->first('content')}}</span>
                                                @endif
                                            </div>

                                        </div>
                                   
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group ">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{old('thumbnail')}}" required>
                                        
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                    <div class="input-group">
                                        <input type="submit" class="btn btn-info" value="Submit">
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
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });

    $(document).ready(function () {
        $('#lfm').filemanager('image');
    });

</script>
@stop