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
                            <h2 class="panel-title">Pencarian tags : {{$tags->name}}</h2>
                            <a href="{{route('forum.create')}}" class="btn btn-success btn-sm pull-right">Buat
                                Pertanyaan</a>
                            <br>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12" id="tc_container_wrap">

                                    <div class="col-md-12">
                                        
                                        <table class="table table-hover">
                                            <thead id="tc_thead">
                                                <tr>
                                                    <th scope="col">Thread</th>
                                                    <th scope="col">Comments</th>
                                                    <th scope="col">Views</th>
                                                    <th scope="col">Author</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($tags->forum as $forum)
                                                <tr>
                                                    <td width="453">
                                                        <div class="forum_title">
                                                            <h4> <a
                                                                    href="{{route('forumslug',$forum->slug)}}">{{ str_limit($forum->title,30)}}</a>
                                                            </h4>
                                                            {!! str_limit($forum->deskripsi,100)!!}
                                                            <br>
                                                            @if(empty($forum->image))
                                                            @else
                                                            <div class="label label-success tag_label_image">
                                                                <i class="fa fa-image"></i></div>
                                                            @endif
                                                            @foreach($forum->tags as $tag)
                                                            <a href="{{route('tag.show', $tag->name)}}#"
                                                                class="label label-success tag_label">#{{$tag->name}}</a>
                                                            @endforeach

                                                        </div>
                                                    </td>
                                                    <td style="text-align: center"><small>
                                                            {{$forum->comments->count()}}</small>
                                                    </td>
                                                    <td style="text-align: center"><small>
                                                            {{views($forum)->count()}}</small>
                                                    </td>
                                                    <td>
                                                        <div class="forum_by">
                                                            <small
                                                                style="margin-bottom: 0; color: #666">{{$forum->created_at->diffforHumans()}}</small>
                                                            <small>by <a href="#">{{$forum->user->name}}</a></small>
                                                        </div>
                                                    </td>
                                                    <td>

                                                        @if(auth()->user()->role == 'admin')
                                                        <form action="{{route('forum.destroy',$forum->slug)}}"
                                                            method="post">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm btn-block">DELETE</button>
                                                            <a href="{{route('forum.edit',$forum->slug)}}"
                                                                class="btn btn-warning btn-sm btn-block">EDIT</a>
                                                            @endif
                                                            <a href="{{route('forumslug',$forum->slug)}}"
                                                                class="btn btn-info btn-sm btn-block">VIEW</a>
                                                        </form>


                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
                                            Tulis materi sesuai yang Anda kuasai untuk dapat diakses oleh siswa Anda.
                                            Semakin banyak materi yang di publish akan memperkaya konten dari aplikasi ini
                                            dan bermanfaat untuk siswa Anda.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title">Popular Thread</h2>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                
                                        @include('forum.popular')
                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title">Tag</h2>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                            @if(auth()->user()->role == 'admin')
                                            <a href="/tag/create" class="btn btn-primary btn-block">Edit Tags</a> <br>
                                            @endif
                                        @foreach($tagAll as $tag)
                                        <a href="{{route('tag.show', $tag->slug)}}" class="label label-info">
                                            {{$tag->name}} ({{$tag->forum->count()}} <small>
                                                thread </small>)
                                        </a> 
                                        @endforeach
                
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
@stop