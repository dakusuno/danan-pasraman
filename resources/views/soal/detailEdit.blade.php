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
                            <h2 class="panel-title">Edit Pertanyaan</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="/detailsoal/{{$detailsoals->id}}/detailUpdate" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="soal">Pertanyaan</label>
                                            <textarea name="pertanyaan" id="isi" class="form-control" placeholder="Soal"
                                                rows="3">{{$detailsoals->pertanyaan}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Pilihan A</label>
                                            <textarea name="pila" id="pilihanA" class="form-control"
                                                placeholder="Deskripsi" rows="3">{{$detailsoals->pila}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pilihanB">Pilihan B</label>
                                            <textarea name="pilb" id="isi" class="form-control" placeholder="pilihanB"
                                                rows="3">{{$detailsoals->pilb}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pilihanC">Pilihan C</label>
                                            <textarea name="pilc" id="isi" class="form-control" placeholder="pilihanC"
                                                rows="3">{{$detailsoals->pilc}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pilihanD">Pilihan D</label>
                                            <textarea name="pild" id="isi" class="form-control" placeholder="pilihanD"
                                                rows="3">{{$detailsoals->pild}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label name="" for="kunci">Kunci</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="kunci" id="a" value="A"
                                                    <?php if($detailsoals->kunci=='A'): echo 'checked'; ?><?php endif; ?>>
                                                    Jawaban <b>A</b>
                                                </label> &nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="kunci" id="b" value="B"
                                                    <?php if($detailsoals->kunci=='B'): echo 'checked'; ?><?php endif; ?>>
                                                    Jawaban <b>B</b>
                                                </label> &nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="kunci" id="c" value="C"
                                                    <?php if($detailsoals->kunci=='C'): echo 'checked'; ?><?php endif; ?>>
                                                    Jawaban <b>C</b>
                                                </label> &nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="kunci" id="d" value="D"
                                                    <?php if($detailsoals->kunci=='D'): echo 'checked'; ?><?php endif; ?>>
                                                    Jawaban <b>D</b>
                                                </label> &nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="score">Score</label>
                                            <input name="score" class="form-control" placeholder="score" id="Score" value="{{$detailsoals->score}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" placeholder="Pilih Jenis Status">
                                                <option value="0" @if($detailsoals->status == '0') selected @endif>Tidak Tampil</option>
                                                <option value="1"@if($detailsoals->status == '1') selected @endif>Tampil</option>
                                            </select>
                                        </div>

                                        <div>
                                            <input type="button" class="btn btn-sm btn-danger" value="Cancel">
                                            <input type="submit" class="btn btn-sm btn-warning" value="Update">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <h2 class="panel-title"> <i class="fa fa-info-circle"></i> Informasi</h2>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <span>Tag befungsi dalam mempermudah pencarian setiap pertanyaan dalam forum.</span>
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
@stop