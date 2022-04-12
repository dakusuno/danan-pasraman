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
                            <h2 class="panel-title">Edit Data Buku</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="/buku/{{$buku->id}}/update" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="kode">Kode Buku</label>
                                            <input name="kode" type="text" class="form-control" id="kode"
                                                value="{{$buku->kode}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Judul Buku</label>
                                            <textarea name="judul" id="judul" class="form-control"
                                                rows="3">{{$buku->judul}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pengarang">Pengarang</label>
                                            <input name="pengarang" type="text" class="form-control" id="pengarang"
                                                value="{{$buku->pengarang}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="penerbit">Penerbit</label>
                                            <input name="penerbit" type="text" class="form-control" id="penerbit"
                                                value="{{$buku->penerbit}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun">Tahun</label>
                                            <input name="tahun" type="text" class="form-control" id="tahun"
                                                value="{{$buku->tahun}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input name="jumlah" type="text" class="form-control" id="jumlah"
                                                value="{{$buku->jumlah}}">
                                        </div>
                                        <div>
                                            <input type="submit" class="btn btn-sm btn-warning" value="Update">
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
@stop