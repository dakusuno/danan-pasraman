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
                            <h2 class="panel-title">Daftar Mata Pelajaran</h2>
                            <div href="#subNabe" class="pull-right" data-toggle="collapse">
                                <br>
                                <input type="button" class="btn btn-primary" value="Buat Mata Pelajaran">
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="subNabe ">
                                        <form action="{{route('mapel.create')}}" method="POST"
                                            enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <br>
                                            <div class="form-group {{$errors->has('kode') ? ' has-error' : ''}}">
                                                <label for="kode">Kode</label>
                                                <input name="kode" type="text" class="form-control" id="kode"
                                                    placeholder="Kode Mata Pelajaran" value="{{old('kode')}}" required>

                                            </div>
                                            <div class="form-group {{$errors->has('nama') ? ' has-error' : ''}}">
                                                <label for="nama">Nama</label>
                                                <input name="nama" type="text" class="form-control" id="nama"
                                                    placeholder="Nama Mata Pelajaran" value="{{old('nama')}}" required>

                                            </div>
                                            <div class="form-group {{$errors->has('deskripsi') ? ' has-error' : ''}}">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" id="deskripsi" class="form-control"
                                                    placeholder="Tuliskan Materi" rows="5"
                                                    required>{{old('deskripsi')}}</textarea>

                                            </div>
                                            <div class="form-group {{$errors->has('tingkat_id') ? ' has-error' : ''}}">
                                                <label for="tingkat`">Tingkat</label>
                                                <select name="tingkat_id" class="form-control">
                                                    <option selected disabled>Pilih Tingkat</option>
                                                    @foreach($tingkat as $tk)
                                                    <option required value="{{$tk->id}}"
                                                        {{old($tk->id) == $tk->tk_id ? 'selected' : '' }}>
                                                        {{$tk->tingkat}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="form-group {{$errors->has('nabe_id') ? ' has-error' : ''}}">
                                                <label for="nabe">Nabe</label>
                                                <select name="nabe_id" class="form-control">
                                                    <option selected disabled>Pilih Nabe</option>
                                                    @foreach($data_nabe as $nabe)
                                                    <option required value="{{$nabe->id}}"
                                                        {{old($nabe->id) == $nabe->nabe_id ? 'selected' : '' }}>
                                                        {{$nabe->nama}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div>
                                                <input type="submit" class="btn btn-sm btn-primary" value="Submit">
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