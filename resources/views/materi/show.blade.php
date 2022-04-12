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
                            <h2 class="panel-title">Detail Materi</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="forum_info">
                                                <a href="#" class="label label-success">{{$materi->user->name}}</a>|
                                                <small>{{$materi->created_at->diffForHumans()}} </small>|
                                                <small>{{views($materi)->count()}} Views</small>
                                                <h3>{{$materi->judul}}</h3>
                                            </div>
                                            <hr style="margin-top: 0; margin-bottom: 5px;">
                                            <div class="forum_description">
                                                <p>{!! $materi->isi !!}</p>
                                                <video poster="{{ asset('videos/'.$materi->file) }}" width="100%"
                                                    height="auto;" class="center" controls="controls">
                                                    <source src="{{ asset('videos/'.$materi->file) }}"
                                                        type="video/mp4" />
                                                    <source src="{{ asset('videos/'.$materi->file) }}"
                                                        type="video/webm" />
                                                    <source src="{{ asset('videos/'.$materi->file) }}"
                                                        type="video/avi" />
                                                    <source src="{{ asset('videos/'.$materi->file) }}"
                                                        type="video/mkv" />
                                                    Your browser does not support HTML5 video.

                                                </video>

                                                <!-- <video width="600" class='center' controls>
                                                    <source src="{{ asset('videos/'.$materi->file) }}">

                                                    Your browser does not support HTML5 video.

                                                </video>
                                                <td><img width="150px" src="{{ asset('videos/'.$materi->file) }}"></td> -->
                                            </div>
                                        </div>
                                    </div>
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
<style type="text/css">
    .center {
        margin-left: auto;
        margin-right: auto;
        display: block
    }
</style>

@section('footer')
<script>
    $(document).ready(function () {
        $('#tabelMateri').DataTable();
    }); 
</script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#isi'))
        .catch(error => {
            console.error(error);
        });

    $(document).ready(function () {
        $('#lfm').filemanager('image');
    });
</script>
@stop