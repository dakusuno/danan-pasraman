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
                        <h2 class="panel-title">Bank Soal</h2> <br>
                            <div href="#subNabe" class="pull-left" data-toggle="collapse" class="collapsed">
                                <input type="button" class="btn btn-primary" value="Buat Soal">
                            </div>
                        </div>
                        <br>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="subNabe" class="collapse ">
                                        <form action="">
                                            <div class="form-group">
                                                <label for="jenis">Jenis</label>
                                                <select name="jenis" class="form-control" placeholder="Pilih Jenis Soal">
                                                    <option value="Soal Ujian">Soal Ujian</option>
                                                    <option value="Soal Latihan">Soal Latihan</option>
                                                </select>
                                                <br>
                                            </div>
                                        </form>
                                    </div>
                                    <table class="table table-hover" id="tabelSoal">
                                        <thead>
                                            <tr>
                                                <th>MATERI</th>
                                                <th>DESKRIPSI</th>
                                                <th>WAKTU</th>
                                                <th>STATUS</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($soals as $soal)
                                            <tr>
                                                <td>{{$soal->materi->judul}}</td>
                                                <td>{{$soal->deskripsi}}</td>
                                                <td>{{$soal->waktu}}</td>
                                                <td>{{$soal->status}}</td>
                                                <td>
                                                    <a href="/soal/{{$soal->id}}" type="button" class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i></a>
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
    </div>
</div>
@stop

@section('footer')
<script>
    $(document).ready( function () {
        $('#tabelSoal').DataTable();
    }); 
</script>

@stop