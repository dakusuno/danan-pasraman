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
                            <h2 class="panel-title">Data Tingkat</h2>
                            @if(auth()->user()->role == 'admin')
                            <div href="#subNabe" class="pull-right" data-toggle="collapse" class="collapsed">
                                <input type="button" class="btn btn-primary" value="Tambah Tingkat">
                            </div>
                            @endif
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="subNabe" class="collapse ">
                                        <form action="/tingkat/create" method="post">
                                        {{csrf_field()}}
                                            <div class="form-group {{$errors->has('tingkat') ? 'has-error' : ''}}">
                                                <label for="tingkat">Tingkat</label>
                                                <input name="tingkat" type="text" class="form-control"
                                                    id="tingkat" placeholder="Tingkat" value="{{old('tingkat')}}" required>
                                                @if($errors->has('tingkat'))
                                                    <span class="help-block">{{$errors->first('tingkat')}}</span>
                                                @endif
                                            </div>
                                            <div>
                                                <input type="submit" class="btn btn-sm btn-success" value="Submit">
                                            </div>
                                        </form>
                                    </div> <br> <br>
                                    <div>
                                    @php $no = 1; @endphp
                                        <table class="table table-hover" id="tabelKelas">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>TINGKAT</th>
                                                    @if(auth()->user()->role == 'admin')
                                                    <th>AKSI</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($tingkat as $tk)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$tk->tingkat}}</td>
                                                    @if(auth()->user()->role == 'admin')
                                                    <td>
                                                    <div class="btn-group-vertical" role="group">
                                                        <a href="/tingkat/{{$tk->id}}/edit" type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                                        <a href="#" type="button" class="btn btn-danger btn-xs delete" 
                                                        tingkat-id="{{$tk->id}}"><i class="lnr lnr-trash"></i></a>
                                                    </div>
                                                    </td>
                                                    @endif
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
                                       Ini merupakan halaman tingkat. Buat tingkatan sesuai dengan kondisi terkini 
                                       pada Pasraman Pinandita Brahma Vidya Samgraha Buleleng.
                                    </p>
                                    <p>
                                        Jika terdapat data Tingkat yang tidak valid, silahkan update data tingkat dengan mengklik 
                                        tombol <i class="fa fa-pencil"></i>
                                        
                                    </p>
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
    $(document).ready( function () {
        $('#tabelKelas').DataTable();
    }); 
</script>

<script>
    $('.delete').click(function(){
        var tingkat_id = $(this).attr('tingkat-id');
        swal({
            title: "Yakin ?",
            text: "Mau dihapus data tingkat dengan id "+tingkat_id+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
                window.location = "/tingkat/"+tingkat_id+"/delete";
            }
        });
    });
</script>
@stop