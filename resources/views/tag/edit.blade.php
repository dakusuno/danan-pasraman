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
                            <h2 class="panel-title">Edit Tag</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('tag.update',$tag->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <div class="form-row">
                                            <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
                                                <label for="tag">Tag</label>
                                                <input name="name" type="text" class="form-control" id="tc_input"
                                                   value="{{$tag->name}}">
                                                @if($errors->has('name'))
                                                <span class="help-block">{{$errors->first('name')}}</span>
                                                @endif
                                                <br>

                                                <div class="input-group">
                                                    <input type="submit" class="btn btn-warning" value="Update">
                                                </div>
                                            </div>
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
                                    <span>Tag befungsi dalam mempermudah pencarian setiap pertanyaan dalam forum.</span>
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