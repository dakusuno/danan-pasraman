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
                    <div class="panel" style="height:auto;">
                        <div class="container-fluid" style="background-color:#9bd0eb;color:#fff;height:150px;">
                            <h1><strong>{!! $data_mapel->nama !!}</strong></h1>
                            <p> {!! $data_mapel->deskripsi!!} </p>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BASIC TABS -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li><a href="#info" role="tab" data-toggle="tab">Informasi Mata
                                                Pelajaran</a></li>
                                        <li class="active"><a href="#materi" role="tab" data-toggle="tab">Materi</a>
                                        </li>
                                        <li><a href="#soal" role="tab" data-toggle="tab">Soal</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in " id="info">

                                            {!! $data_mapel->deskripsi!!}
                                        </div>

                                        <div class="tab-pane fade" id="soal">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    @foreach($soal as $soals)
                                                    <?php
$jawaban = \App\Jawaban::whereSoalId($soals->id)->whereUserId(Auth::user()->id)->first();
?>
                                                    <div class="col-md-6">
                                                        <div class="panel panel-danger">
                                                            <div class="panel-heading">
                                                                <p> Mata Pelajaran : <br> <strong>
                                                                        @if($soals->materi == null)
                                                                        {{$soals->mapel->nama}}
                                                                        @else
                                                                        {{$soals->materi->judul}}
                                                                        @endif
                                                                    </strong>
                                                                </p>
                                                            </div>
                                                            <div class="panel-body">
                                                                <p><strong> Deskripsi : </strong><br>
                                                                    {{$soals->deskripsi}}
                                                                    
                                                                </p>
                                                                <p><strong> KKM : </strong>
                                                                    {{$soals->kkm}}
                                                                </p>
                                                                <p><strong>Nilai : </strong>
                                                                    {{$jawaban->score}}
                                                                </P>
                                                                <p><strong>Status : </strong>
                                                                    @if($jawaban != null)
                                                                    @if ($jawaban->status == 1 )
                                                                    <td><span class="label label-success">Lulus</span>
                                                                    </td>
                                                                    @elseif ($jawaban->status == 2)
                                                                    <td><span class="label label-danger">Tidak
                                                                            Lulus</span></td>
                                                                    @else
                                                                    <td><span class="label label-primary">Belum
                                                                            dikerjakan</span>
                                                                    </td>
                                                                    @endif
                                                                    @else
                                                                    <td><span class="label label-primary">Belum
                                                                            dikerjakan</span>
                                                                    </td>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            <div class="panel-footer">
                                                                <a href="/sisya/soal/{{$soals->id}}" type="button"
                                                                    class="btn btn-primary btn-xs"><strong>KERJAKAN
                                                                    </strong>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="col-md-6">
                                                    @foreach($soalMateri as $soals)
                                                    <?php
$jawaban = \App\Jawaban::whereSoalId($soals->id)->whereUserId(Auth::user()->id)->first();

?>
                                                    <div class="col-md-6">
                                                        <div class="panel panel-warning">
                                                            <div class="panel-heading">
                                                                <p> Materi : <br> <strong>
                                                                        @if($soals->materi == null)
                                                                        {{$soals->mapel->nama}}
                                                                        @else
                                                                        {{$soals->materi->judul}}
                                                                        @endif
                                                                    </strong>
                                                                </p>
                                                            </div>
                                                            <div class="panel-body">
                                                                <p><strong> Deskripsi : </strong><br>
                                                                    {{$soals->deskripsi}}
                                                                </p>
                                                                <p><strong> KKM : </strong>
                                                                    {{$soals->kkm}}
                                                                </p>
                                                                @if($jawaban!==null)
                                                                <p>
                                                                    <strong>Nilai : </strong>
                                                                    {{$jawaban->score}}
                                                                </P>
                                                                @endif
                                                                <p><strong>Status : </strong>
                                                                    @if($jawaban != null)
                                                                    @if ($jawaban->status == 1 )
                                                                    <td><span class="label label-success">Lulus</span>
                                                                    </td>
                                                                    @elseif ($jawaban->status == 2)
                                                                    <td><span class="label label-danger">Tidak
                                                                            Lulus</span></td>
                                                                    @else
                                                                    <td><span class="label label-primary">Belum
                                                                            dikerjakan</span>
                                                                    </td>
                                                                    @endif
                                                                    @else
                                                                    <td><span class="label label-primary">Belum
                                                                            dikerjakan</span>
                                                                    </td>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            <div class="panel-footer">
                                                                <a href="/sisya/soal/{{$soals->id}}" type="button"
                                                                    class="btn btn-primary btn-xs"><strong>KERJAKAN
                                                                    </strong>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade in active" id="materi">
                                            <div class="col-md-2">
                                                <p>
                                                    {!! $data_mapel->deskripsi!!}

                                                </p>
                                            </div>

                                            <div class="col-md-10">
                                                @foreach($materi as $mt)
                                                <div class="col-md-4">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <p>{{$mt->judul}}</p>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div>
                                                                <img src="{{asset('admin/assets/img/display.jpg')}}"
                                                                    style="width:100%" class="img-rounded"
                                                                    alt="Display">
                                                            </div> <br>
                                                            <div class="caption">
                                                                {!! str_limit($mt->isi,150) !!}
                                                            </div>


                                                        </div>
                                                        <div class="panel-footer">
                                                            <a href="/materi/{{$mt->id}}/show" type="button"
                                                                class="btn btn-info btn-xs"><strong>SELENGKAPNYA
                                                                </strong>
                                                                <i class="lnr lnr-arrow-right-circle"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <!-- END BASIC TABS -->
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
@section('footer')
<script>
$(document).ready(function() {
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

$(document).ready(function() {
    $('#lfm').filemanager('file');
});
</script>
@stop