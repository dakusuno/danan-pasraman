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
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Edit Soal</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="/soal/{{$soal->id}}/update" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="jenis">Jenis</label>
                                            <select name="jenis" class="form-control" placeholder="Pilih Jenis Soal">
                                                <option value="Soal Ujian" @if($soal->jenis == 'Soal Ujian') selected @endif>Soal Ujian</option>
                                                <option value="Soal Latihan"@if($soal->jenis == 'Soal Latihan') selected @endif>Soal Latihan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                                <label for="materi">Materi</label>
                                                <select name="materi_id" class="form-control" placeholder="Pilih Jenis Materi">
                                                @foreach($materis as $materi)
                                                    <option value="{{$materi->id}}"
                                                        @if ($materi->id === $soal->materi_id)
                                                            selected
                                                        @endif
                                                    >{{$materi->judul}}</option>
                                                @endforeach
                                                </select>
                                                
                                            </div>
                                        <!-- <div class="form-group">
                                            <label for="paket">Paket</label>
                                            <input name="paket" class="form-control" placeholder="Nama Paket"
                                                id="paket" value="{{$soal->paket}}">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"
                                                rows="3">{{$soal->deskripsi}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="kkm">KKM</label>
                                            <input name="kkm" class="form-control" placeholder="KKM" id="kkm" value="{{$soal->kkm}}">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="waktu">Waktu</label> <small>dalam satuan menit</small>
                                            <input name="waktu" class="form-control"
                                                placeholder="Waktu pekerjaan dalam satuan menit" id="waktu" value="{{$soal->waktu}}">
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" placeholder="Pilih Jenis Status">
                                                <option value="Tidak Tampil" @if($soal->status == 'Tidak Tampil') selected @endif>Tidak Tampil</option>
                                                <option value="Tampil" @if($soal->status == 'Tampil') selected @endif>Tampil</option>
                                            </select>
                                        </div> -->

                                        <div>
                                        @if(auth()->user()->role == 'admin')
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
@stop