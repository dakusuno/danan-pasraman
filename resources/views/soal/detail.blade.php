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
                            <a href="/soal/{{$soal->id}}/edit" type="button" class="btn btn-primary btn-sm">Ubah
                                Data</a>
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
                                        <td>Jenis Soal</td>
                                        <td>:</td>
                                        <td>
                                            @if($soal->jenis == 0)
                                            Soal Ulangan

                                            @else
                                            Soal Ujian
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        @if($soal->jenis == 0)
                                        <td>Materi</td>
                                        <td>:</td>
                                        <td>{{$soal->materi->judul}}</td>
                                        @else
                                        <td>Mapel</td>
                                        <td>:</td>
                                        <td>{{$soal->mapel->nama}}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td>{{$soal->deskripsi}}</td>
                                    </tr>
                                    <tr>
                                        <td>KKM</td>
                                        <td>:</td>
                                        <td>{{$soal->kkm}}</td>
                                    </tr>
                                    <tr>
                                        <td>Dibuat oleh</td>
                                        <td>:</td>
                                        <td>{{$soal->user->name}}</td>
                                    </tr>
                                </tbody>
                            </table>
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
                            <h2 class="panel-title">Detail Soal</h2> <br>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12" style="overflow:auto;">
                                    <form action="{!! route('detailsoalstatus.store', $soal->id) !!}" method="POST">
                                        @csrf
                                        @if(auth()->user()->role == 'admin')
                                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                                        @endif

                                        <table class="table table-hover" id="tabelSoal">

                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>SOAL</th>
                                                    <th>AKSI</th>
                                                    <th>STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($banksoal as $index => $bg)
                                                <input type="hidden" name="detailsoal[{{$index}}]"
                                                    value="{{$bg->id}}" />
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{!! $bg->pertanyaan !!}</td>
                                                    <td>
                                                        <a href="#" type="button" class="btn btn-info btn-xs"
                                                            data-toggle="modal" data-target="#exampleModal"><i
                                                                class="fa fa-info-circle"></i></a>

                                                    </td>
                                                    <td>
                                                        @if($detailstatussoal->count() != 0)
                                                        @foreach($detailstatussoal as $dss)
                                                        @if($bg->id == $dss->banksoal_id)

                                                        <input data-id="{{$bg->status}}" type="checkbox"
                                                            name="statussoal[{{$index}}]" data-toggle="toggle"
                                                            data-size="small" {{($dss->status == 1) ? 'checked' : ''}}
                                                            data-on="Tampil" data-onstyle="success"
                                                            data-off="Tidak Tampil" data-offstyle="danger">

                                                        @endif
                                                        @endforeach
                                                        @else
                                                        <input data-id="{{$bg->status}}" type="checkbox"
                                                            name="statussoal[{{$index}}]" data-toggle="toggle"
                                                            data-size="small" }} data-on="Tampil" data-onstyle="success"
                                                            data-off="Tidak Tampil" data-offstyle="danger">
                                                        @endif
                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @foreach($banksoal as $soals)
            <div class="modal-body">
                <small><strong>Pertanyaan : </strong></small>
                <div>
                   {{ $soals->pertanyaan }}
                </div> <br>
                <small><strong>Jawaban : </strong></small>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$soals->banksoal_id}}" value="A" disabled>
                    <label class="form-check-label" for="">
                    {{$soals->pila}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$soals->banksoal_id}}" value="A" disabled>
                    <label class="form-check-label" for="">
                    {{$soals->pilb}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$soals->banksoal_id}}" value="A" disabled>
                    <label class="form-check-label" for="">
                    {{$soals->pilc}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$soals->banksoal_id}}" value="A" disabled>
                    <label class="form-check-label" for="">
                    {{$soals->pild}}
                    </label>
                </div>
            </div>
            @endforeach
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
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