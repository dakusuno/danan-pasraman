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
                            <h2 class="panel-title">Edit Data Nabe</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="/nabe/{{$nabe->id}}/update" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                                            <label for="nama">Nama Nabe</label>
                                            <input name="nama" type="text" class="form-control" id="nama"
                                                placeholder="Nama Nabe" value="{{$nabe->nama}}">
                                                @if($errors->has('nama'))
                                                    <span class="help-block">{{$errors->first('nama')}}</span>
                                                @endif
                                        </div>
                                        <div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
                                            <label for="username">Username</label>
                                            <input name="username" type="username" class="form-control" id="username"
                                                placeholder="Username" value="{{$nabe->user->username}}">
                                                @if($errors->has('username'))
                                                    <span class="help-block">{{$errors->first('username')}}</span>
                                                @endif
                                        </div>
                                        <div class="form-group {{$errors->has('hp') ? 'has-error' : ''}}">
                                            <label for="hp">Nomber Hp</label>
                                            <input name="hp" type="text" class="form-control" id="hp"
                                                placeholder="Nomor Nabe yang dapat dihubungi" value="{{$nabe->hp}}">
                                                @if($errors->has('hp'))
                                                    <span class="help-block">{{$errors->first('hp')}}</span>
                                                @endif
                                        </div>
                                        <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" class="form-control" placeholder="Alamat" rows="5" >{{$nabe->alamat}}</textarea>
                                            @if($errors->has('alamat'))
                                                <span class="help-block">{{$errors->first('alamat')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                        <label>Aktivasi Akun</label>
                                        <select name="status" id="status" class="form-control">
                                            <option selected disabled>Status Akun</option>
                                            <option value="0" @if($nabe->status == 0) selected @endif>Tidak Aktif</option>
                                            <option value="1" @if($nabe->status == 1) selected @endif>Aktif</option>
                                        </select>
                                        @if($errors->has('status'))
                                        <span class="help-block">{{$errors->first('status')}}</span>
                                        @endif
                                        
                                    </div>

                                        <div class="form-group">
                                            <label for="avatar">Avatar</label>
                                            <input name="avatar" type="file" class="form-control" id="avatar">

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