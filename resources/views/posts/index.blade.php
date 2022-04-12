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
                            <h2 class="panel-title">Posts</h2> <br>
                             <div class="pull-right">
                                <a href="{{route('posts.add')}}" class="btn btn-sm  btn-primary">
                                    <span>Add New Post</span>
                                </a>
                            </div>
                            
                            <p class="text-muted font-13 m-b-30">
                                Data dibawah merupakan tampilan data post yang dibuat oleh admin
                            </p>
                        </div>
                        <div class="panel-body" style="overflow-x:auto;">
                        @php $no = 1; @endphp
                            <table class="table table-hover" id="tabelPosts">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>TITLE</th>
                                        <th>CONTENT</th>
                                        <th>USER</th>
                                        <th>PUBLISH</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$post->title}} </td>
                                        <td>{!! str_limit($post->content,50) !!}</td>
                                        <td>{{$post->user->name}}</td>
                                        <td>{{$post->created_at->format('d M Y')}} <small>{{$post->created_at->format('H:i:s')}}</small></td>
                                        <td>
                                            <div class="btn-group">
                                            @if(auth()->user()->role == 'admin')
                                            <a href="/post/{{$post->id}}/edit" class="btn btn-warning btn-sm" style="padding: 4px 30px; " >EDIT</a>
                                            <a href="#" class="btn btn-danger btn-sm delete" style="padding: 4px 22px;" post-id="{{$post->id}}">DELETE</a> 
                                            @endif
                                            <a target="_blank" href="{{route('site.single.post',$post->slug)}}" style="padding: 4px 29px;" class="btn btn-info btn-sm">VIEW</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
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
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
 
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

</style>
@stop
@section('footer')
    <script>
        $(document).ready( function () {
            $('#tabelPosts').DataTable();
        }); 
    </script>
    <script>
        $('.delete').click(function(){
            var post_id = $(this).attr('post-id');
            swal({
                title: "Yakin?",
                text: "Mau dihapus data Post dengan ID "+post_id+" ini!?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if(willDelete) {
                        window.location ="/post/"+post_id+"/delete";
                        
                    } 
            });
        });
    </script>
    
@stop