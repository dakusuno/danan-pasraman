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
                            <h2 class="panel-title">View Pertanyaan</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="#" method="get">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <p>
                                                {!!$detailsoals->pertanyaan!!}
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <p>
                                                <input type="radio" name="pilihan" id="pila">
                                                <label for="pila">
                                                    <?php $pila = str_replace("<p>", "", $detailsoals->pila); $pila = str_replace("</p>", "", $pila); echo $pila; ?>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <p>
                                                <input type="radio" name="pilihan" id="pilb">
                                                <label for="pilb">
                                                    <?php $pilb = str_replace("<p>", "", $detailsoals->pilb); $pilb = str_replace("</p>", "", $pilb); echo $pilb; ?>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <p>
                                                <input type="radio" name="pilihan" id="pilc">
                                                <label for="pilc">
                                                    <?php $pilc = str_replace("<p>", "", $detailsoals->pilc); $pilc = str_replace("</p>", "", $pilc); echo $pilc; ?>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <p>
                                                <input type="radio" name="pilihan" id="pild">
                                                <label for="pild">
                                                    <?php $pild = str_replace("<p>", "", $detailsoals->pild); $pild = str_replace("</p>", "", $pild); echo $pild; ?>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label name="" for="kunci">Kunci</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="kunci" id="a" value="A" disabled
                                                    <?php if($detailsoals->kunci=='A'): echo 'checked'; ?><?php endif; ?>>
                                                    Jawaban <b>A</b>
                                                </label> &nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="kunci" id="b" value="B" disabled
                                                    <?php if($detailsoals->kunci=='B'): echo 'checked'; ?><?php endif; ?>>
                                                    Jawaban <b>B</b>
                                                </label> &nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="kunci" id="c" value="C" disabled
                                                    <?php if($detailsoals->kunci=='C'): echo 'checked'; ?><?php endif; ?>>
                                                    Jawaban <b>C</b>
                                                </label> &nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="kunci" id="d" value="D" disabled
                                                    <?php if($detailsoals->kunci=='D'): echo 'checked'; ?><?php endif; ?>>
                                                    Jawaban <b>D</b>
                                                </label> &nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <?php
                                            if ($detailsoals->status == 'Tampil') {
                                                $detailsoals = 'Tampil';
                                            }else{
                                                $detailsoals = 'Tidak tampil';
                                            }
                                        ?>
                                        <p>Status soal : {{$detailsoals}}</p>
                                        </div> <br>

                                        <div>
                                            <a href="/soal" 
                                            type="button" class="btn btn-info">
                                            <i class="lnr lnr-arrow-left-circle">  Paket Soal</i></a>
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