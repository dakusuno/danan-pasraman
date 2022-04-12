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
                            <h2 class="panel-title">Data Kelas</h2>
                            @if(auth()->user()->role == 'admin')
                            <div href="#subNabe" class="pull-right" data-toggle="collapse" class="collapsed">
                                <input type="button" class="btn btn-primary" value="Tambah Kelas">
                            </div>
                            @endif
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="subNabe" class="collapse ">
                                        <form action="/kelas/create" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="tingkat">Tingkat</label>
                                                <select name="tingkat_id" class="form-control" required>
                                                    @foreach($tingkat as $tk)
                                                    <option value="{{$tk->id}}"
                                                        {{$tk->id == $tk->tingkat_id ? 'selected' : '' }}>
                                                        {{$tk->tingkat}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nabe">Nabe Pengampu</label>
                                                <select name="nabe_id" class="form-control" required>
                                                    @foreach($data_nabe as $nabe)
                                                    <option value="{{$nabe->id}}"
                                                        {{$nabe->id == $nabe->nabe_id ? 'selected' : '' }}>
                                                        {{$nabe->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group {{$errors->has('kelas') ? 'has-error' : ''}}">
                                                <label for="kelas">Kelas</label>
                                                <input name="kelas" type="text" class="form-control" id="kelas"
                                                    placeholder="20xx/0x/Jro Mangku" value="{{old('kelas')}}" required>
                                                @if($errors->has('kelas'))
                                                <span class="help-block">{{$errors->first('kelas')}}</span>
                                                @endif
                                            </div>

                                            <div>
                                                <input type="submit" class="btn btn-sm btn-success" value="Submit">
                                            </div>
                                        </form>
                                    </div> <br> <br>
                                    <div style="overflow:auto;"> 
                                    @php $no = 1; @endphp
                                        <table class="table table-hover" id="tabelKelas">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>KELAS</th>
                                                    <th>NABE</th>
                                                    <th>JUMLAH</th>
                                                    @if(auth()->user()->role == 'admin')
                                                    <th>AKSI</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data_kelas as $kelas)
                                                <tr>
                                                <?php
                                                    $datakelasCount = \App\Detailkelas::whereKelasId($kelas->id)->count();
                                                ?>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$kelas->kelas}}</td>
                                                    <td>{{$kelas->nabe->nama}}</td>
                                                    <td>
                                                        <a href="/kelas/{{$kelas->id}}/list">{{$datakelasCount}}</a>
                                                                
                                                    </td>
                                                    @if(auth()->user()->role == 'admin')
                                                    <td>
                                                    <div class="btn-group-vertical" role="group">
                                                   
                                                        <a href="/kelas/{{$kelas->id}}/edit" type="button"
                                                            class="btn btn-warning btn-xs"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="#" type="button"
                                                            class="btn btn-danger btn-xs delete" kelas-id="{{$kelas->id}}">
                                                            <i class="lnr lnr-trash"></i></a>
                                                        <a href="/kelas/{{$kelas->id}}/detail" type="button"
                                                            class="btn btn-info btn-xs"><i
                                                                class="fa fa-info-circle"></i></a>
                                                              
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
                                        Daftarkan seluruh kelas malalui halaman ini.
                                        Data kelas diperlukan untuk mengelompokan sisya dan untuk melakukan pembelajaran
                                        hingga mendistribusian paket soal.
                                    </p>
                                    <p>
                                        Jika terdapat data kelas yang belum valid atau kelas yang belum terdaftar,
                                        hubungi admin untuk merubah atau mendaftarkan kelas tersebut.
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
    $(document).ready(function () {
        $('#tabelKelas').DataTable();
    }); 
</script>

<script>
    $('.delete').click(function(){
        var kelas_id = $(this).attr('kelas-id');
        swal({
            title: "Yakin ?",
            text: "Mau dihapus data kelas dengan id "+kelas_id+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
                window.location = "/kelas/"+kelas_id+"/delete";
            }
        });
    });
</script>
@stop