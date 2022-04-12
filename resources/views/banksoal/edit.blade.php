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
                <div class="col-md-7">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Edit Soal</h2> <br>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="subNabe" >
                                        <form action="/banksoal/{{$banksoal->id}}/update" method="post">
                                            {{csrf_field()}}
                                            <label for="materi">Materi</label>
                                            <select name="materi_id" class="form-control"
                                                placeholder="Pilih Jenis Materi">
                                                <option value="disabled" disabled>Pilih Materi</option>
                                                @foreach($materis as $materi)
                                                <option value="{{$materi->id}}">{{$materi->judul}}</option>
                                                @endforeach
                                            </select>
                                            <small> <i class="fa fa-info-circle"></i> Materi ditentukan terlebih dahulu
                                                sebelum banksoal
                                                dibuat.</small>
<br> <br>
                                            <div class="form-group">
                                                <label for="soal">Soal</label>
                                                <textarea name="pertanyaan" id="isi" class="form-control"
                                                    placeholder="Soal" rows="3">{{$banksoal->pertanyaan}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Pilihan A</label>
                                                <textarea name="pila" id="pilihanA" class="form-control"
                                                    placeholder="Deskripsi" rows="3">{{$banksoal->pila}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="pilihanB">Pilihan B</label>
                                                <textarea name="pilb" id="isi" class="form-control"
                                                    placeholder="pilihanB" rows="3">{{$banksoal->pilb}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="pilihanC">Pilihan C</label>
                                                <textarea name="pilc" id="isi" class="form-control"
                                                    placeholder="pilihanC" rows="3">{{$banksoal->pilc}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="pilihanD">Pilihan D</label>
                                                <textarea name="pild" id="isi" class="form-control"
                                                    placeholder="pilihanD" rows="3">{{$banksoal->pild}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label name="" for="kunci">Kunci</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="kunci" id="a" value="A"
                                                            <?php if($banksoal->kunci=='A'): echo 'checked'; ?>
                                                            <?php endif; ?>>
                                                        Jawaban <b>A</b>
                                                    </label> &nbsp;&nbsp;&nbsp;
                                                    <label>
                                                        <input type="radio" name="kunci" id="b" value="B"
                                                            <?php if($banksoal->kunci=='B'): echo 'checked'; ?>
                                                            <?php endif; ?>>
                                                        Jawaban <b>B</b>
                                                    </label> &nbsp;&nbsp;&nbsp;
                                                    <label>
                                                        <input type="radio" name="kunci" id="c" value="C"
                                                            <?php if($banksoal->kunci=='C'): echo 'checked'; ?>
                                                            <?php endif; ?>>
                                                        Jawaban <b>C</b>
                                                    </label> &nbsp;&nbsp;&nbsp;
                                                    <label>
                                                        <input type="radio" name="kunci" id="d" value="D"
                                                            <?php if($banksoal->kunci=='D'): echo 'checked'; ?>
                                                            <?php endif; ?>>
                                                        Jawaban <b>D</b>
                                                    </label> &nbsp;&nbsp;&nbsp;
                                                </div>
                                            </div>
                                            <div>
                                            @if(auth()->user()->role == 'admin')
                                                <input type="button" class="btn btn-sm btn-info" onclick="history.back(-1)" value="Back">
                                                <input type="submit" class="btn btn-sm btn-warning" value="Update">
                                                @endif
                                            </div>
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
</div>
@stop
