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
                            <h2 class="panel-title">Data Nabe</h2>
                            @if(auth()->user()->role == 'admin')
                            <div href="#subNabe" class="pull-right" data-toggle="collapse" class="collapsed">
                                <input type="button" class="btn btn-primary" value="Tambah Nabe">
                            </div>
                            @endif
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="subNabe" class="collapse ">
                                        <form action="/nabe/create" method="post">
                                        {{csrf_field()}}
                                            <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                                                <label for="nama">Nama Nabe</label>
                                                <input name="nama" type="text" class="form-control" id="nama"
                                                    placeholder="Nama Nabe" value="{{old('nama')}}" required>
                                                @if($errors->has('nama'))
                                                    <span class="help-block">{{$errors->first('nama')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label for="username">Username</label>
                                                <input name="username" type="username" class="form-control" id="username"
                                                    placeholder="Username" value="{{old('username')}}" required>
                                                @if($errors->has('username'))
                                                    <span class="help-block">{{$errors->first('username')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('hp') ? 'has-error' : ''}}">
                                                <label for="hp">Nomber Hp</label>
                                                <input name="hp" type="text" class="form-control" id="hp"
                                                    placeholder="Nomor Nabe yang dapat dihubungi" value="{{old('hp')}}" required>
                                                @if($errors->has('hp'))
                                                    <span class="help-block">{{$errors->first('hp')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                                                <label for="alamat">Alamat</label>
                                                <textarea name="alamat" class="form-control" placeholder="Alamat" rows="5" required ></textarea>
                                                @if($errors->has('alamat'))
                                                    <span class="help-block">{{$errors->first('alamat')}}{{old('alamat')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="avatar">Avatar</label>
                                                <input name="avatar" type="file" class="form-control" id="avatar" required>

                                            </div>
                                            <div>
                                                <input type="submit" class="btn btn-sm btn-success" value="Submit">
                                            </div>
                                        </form>
                                    </div> <br> <br>
                                    <div style="overflow:auto;">
                                    @php $no = 1; @endphp
                                        <table class="table table-hover" id="tabelNabe"> 
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NAMA NABE</th>
                                                    <th>HP</th>
                                                    <th>ALAMAT</th>
                                                    @if(auth()->user()->role == 'admin')
                                                    <th>AKSI</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data_nabe as $nabe)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$nabe->nama}}</td>
                                                    <td>{{$nabe->hp}}</td>
                                                    <td>{{$nabe->alamat}}</td>
                                                    @if(auth()->user()->role == 'admin')
                                                    <td>
                                                    <div class="btn-group-vertical" role="group">
                                                        <a href="/nabe/{{$nabe->id}}/edit" type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                                       
                                                        <a href="#" type="button" class="btn btn-danger btn-xs delete"  nabe-id="{{$nabe->id}}"><i class="lnr lnr-trash"></i></a>
                                                        
                                                        <a href="/nabe/{{$nabe->id}}/profile" type="button" class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i></a>
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
                                        Daftarkan seluruh Nabe malalui halaman ini.
                                        Nabe memiliki akses untuk membuat dan menerbitkan soal serta materi.
                                    </p>
                                    <p>
                                        Jika terdapat data Nabe yang belum valid atau Nabe yang belum terdaftar,
                                        hubungi admin untuk merubah atau mendaftarkan Nabe yang bersangkutan.
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
        $('#tabelNabe').DataTable();
    }); 
</script>
<script>
    $('.delete').click(function(){
        var nabe_id = $(this).attr('nabe-id');
        swal({
            title: "Yakin?",
            text: "Mau dihapus data nabe dengan nama "+nabe_id+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            console.log(willDelete);
            if(willDelete){
                window.location ="/nabe/"+nabe_id+"/delete";
            }
        });
    });
</script>
@stop