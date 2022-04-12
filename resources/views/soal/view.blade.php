@extends('layouts.master')

@section('content')
@section('head')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            @if(session('sukses'))

            @endif
            @if(session('error'))

            @endif
            <div class="row">
                <div class="col-md-4">
                    <!-- PANEL DEFAULT -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-info-circle"></i> Informasi</h3> <br>
                            
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i
                                        class="lnr lnr-chevron-up"></i></button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body" style="display: block;">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <td>Materi</td>
                                        <td>:</td>
                                        <td>{{$soal->materi->judul}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Paket</td>
                                        <td>:</td>
                                        <td>{{$soal->paket}}</td>
                                    </tr>

                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td>{{$soal->deskripsi}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Soal</td>
                                        <td>:</td>
                                        <td>{{$soal->jenis}}</td>
                                    </tr>
                                    <tr>
                                        <td>KKM</td>
                                        <td>:</td>
                                        <td>{{$soal->kkm}}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>:</td>
                                        <td>{{$soal->waktu}}</td>
                                    </tr>
                                    <tr>
                                        <td>Dibuat oleh</td>
                                        <td>:</td>
                                        <td>{{$soal->user->name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-info-circle"></i> Timer</h3>

                        </div>
                        <div class="panel-body" style="display: block;">

                            <p>
                                Seluruh siswa (kelas manapun) dapat mengakses soal yang Anda terbitkan.
                                Soal dalam format latihan bisa dikerjakan berkali-kali oleh siswa yang mengkses soal
                                Anda.
                            </p>
                            <p>
                                Susunlan soal untuk memantapkan pemahaman siswa akan materi terkait.
                                Anda dapat memantau siswa yang mengakses soal latihan yang Anda buat melalui halaman
                                Laporan.
                            </p>
                        </div>
                    </div>
                    <!-- END PANEL DEFAULT -->
                </div>

                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Soal {{$soal->materi->judul}}</h2>
                            <br>
                            
                            <div class="pull-right">
                                
                            </div><br>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover" id="tabelSoal">
                                        <?php $no = 0;?>
                                        @foreach($detailsoals as $detailsoal)
                                        <?php $no++ ;?>
                                        <thead>
                                            <tr class="danger">
                                                <th>{{$no}} {!! $detailsoal->pertanyaan !!}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>&nbsp; A &emsp;
                                                    <input type="radio" name="radio" value="<?php echo $detailsoal['id']; ?>">
                                                        &nbsp;<?php echo $detailsoal['pila']; ?>&emsp;
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>&nbsp; B &emsp;
                                                    <input type="radio" name="radio" value="<?php echo $detailsoal['id']; ?>">
                                                        &nbsp;<?php echo $detailsoal['pilb']; ?>&emsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; C &emsp;
                                                    <input type="radio" name="radio" value="<?php echo $detailsoal['id']; ?>">
                                                        &nbsp;<?php echo $detailsoal['pilc']; ?>&emsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; D &emsp;
                                                    <input type="radio" name="radio" value="<?php echo $detailsoal['id']; ?>">
                                                        &nbsp;<?php echo $detailsoal['pild']; ?>&emsp;
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

<!-- Modal Export Import -->
<div class="modal fade" id="importsoal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export & Import File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!!Form::open(['route' => 'soal.import','class' => 'form-horizontal','enctype' =>
                'multipart/form-data'])!!}

                {!!Form::file('data_soal')!!} <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Import</button>

            </div>
        </div>
    </div>
</div>

@stop


@section('footer')
<script>
    $(document).ready(function () {
        $('#tabelSoal').DataTable();
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@stop