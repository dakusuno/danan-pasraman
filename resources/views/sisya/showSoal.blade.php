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
                    <!-- PANEL DEFAULT -->
                    <div class="panel">
                        <div class="container-fluid" style="background-color:#9bd0eb;color:#fff;height:auto;">
                            <h1><strong>Pasraman Pinandita Brahma Vidya Samgraha</strong></h1>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td>{{$detsol->deskripsi}}</td>
                                    </tr>
                                    <tr>
                                        <td>Materi</td>
                                        <td>:</td>
                                        <td>{{$detsol->materi->judul}}</td>


                                    </tr>
                                    <tr>
                                        <td>KKM</td>
                                        <td>:</td>
                                        <td>{{$detsol->kkm}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END PANEL DEFAULT -->
                </div>
                <div class="col-md-12">
                    @foreach($soal as $soals)
                    <div class="panel ">
                        <div class="panel-heading">
                            <h2 class="panel-title"> {{$soals->pertanyaan}}</h2>
                        </div>
                        <form onsubmit="return confirm('Apakah anda yakin untuk submit jawaban?');" action="/jawaban"
                            method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" id="custId" name="soal_id" value="{{$soal[0]->soal_id}}">
                            <input type="hidden" id="mapelId" name="mapel_id" value="{{$soal[0]->mapel_id}}">
                            <div class="panel-body">
                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="{{$soals->banksoal_id}}"
                                        value="A" required>
                                    <label class="form-check-label" for="">
                                        {{$soals->pila}}
                                    </label>
                                </div>
                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="{{$soals->banksoal_id}}"
                                        value="B" required>
                                    <label class="form-check-label" for="gridRadios1">
                                        {{$soals->pilb}}
                                    </label>
                                </div>
                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="{{$soals->banksoal_id}}"
                                        value="C" required>
                                    <label class="form-check-label" for="gridRadios1">
                                        {{$soals->pilc}}
                                    </label>
                                </div>
                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="{{$soals->banksoal_id}}"
                                        value="D" required>
                                    <label class="form-check-label" for="gridRadios1">
                                        {{$soals->pild}}
                                    </label>
                                </div>
                            </div>
                    </div>
                    @endforeach
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title col text-center">Periksa kembali jawaban anda. Tekan submit untuk
                                menyelesaikan
                                latihan.</h2>
                            <br>
                            <div class="col text-center">
                                <input type="submit" class="btn btn-success btn-lg" style="width: 30%;" value="SUBMIT">
                            </div>
                        </div>
                        
                    </div>
                    </form>
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

    $(document).ready(function () {
        $('#lfm').filemanager('file');
    });
</script>
@stop