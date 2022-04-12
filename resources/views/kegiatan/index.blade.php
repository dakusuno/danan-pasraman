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
                            <h2 class="panel-title">Kegiatan</h2> <br>
                             <div class="pull-right">
                                <a href="/kegiatan/add" class="btn btn-sm  btn-primary">
                                    <span>Add New Event</span>
                                </a>
                            </div>
                            
                            <p class="text-muted font-13 m-b-30">
                                Data dibawah merupakan tampilan data kegiatan yang dibuat oleh admin.
                            </p>
                        </div>
                        <div class="panel-body" style="overflow-x:auto;"> @php $no = 1; @endphp
                            <table class="table table-hover" id="tabelPosts">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>JUDUL</th>
                                        <th>DESKRIPSI</th>
                                        <th>TEMPAT</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kegiatans as $keg)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$keg->judul}}</td>
                                        <td>{!! str_limit($keg->deskripsi,70) !!}</td>
                                        <td>{{$keg->tempat}}</td>
                                       
                                        <td>
                                            <div class="btn-group">
                                            @if(auth()->user()->role == 'admin')
                                            <a href="/kegiatan/{{$keg->id}}/edit" class="btn btn-warning btn-sm" style="padding: 4px 30px; " >EDIT</a>
                                            <a href="#" class="btn btn-danger btn-sm delete" style="padding: 4px 22px;" kegiatan-id="{{$keg->id}}">DELETE</a> 
                                            @endif
                                            <a target="_blank" href="{{route('show.kegiatan',$keg->slug)}}" style="padding: 4px 29px;" class="btn btn-info btn-sm">VIEW</a>
                                            </div>
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
            var kegiatan_id = $(this).attr('kegiatan-id');
            swal({
                title: "Yakin?",
                text: "Mau dihapus data Kegiatan dengan ID "+kegiatan_id+" ini!?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if(willDelete) {
                        window.location ="/kegiatan/"+kegiatan_id+"/delete";
                        
                    } 
            });
        });
    </script>
    

@stop