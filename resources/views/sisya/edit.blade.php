@extends('layouts.master')
@section('edit')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Edit Data Sisya</h2>
                            <div class="pull-right">
								<a  class="btn btn-primary" 
                                    href="/sisya/{{$sisya->id}}/password">
                                        <span>Update Password</span>
                                </a>
							</div>
                        </div>
                        <form action="/sisya/{{$sisya->id}}/update" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <label> Biodata Lanang </label>
                                        <div class="form-group {{$errors->has('nama_bapak') ? ' has-error' : ''}}">
                                            <input name="nama_bapak" type="text" class="form-control" id="nama_bapak"
                                                placeholder="Nama Lengkap" value="{{$sisya->nama_bapak}}">
                                            @if($errors->has('nama_bapak'))
                                            <span class="help-block">{{$errors->first('nama_bapak')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" form-group col-md-6 {{$errors->has('nik_bapak') ? ' has-error' : ''}}">
                                        <input name="nik_bapak" type="text" class="form-control" id="nik_bapak"
                                            placeholder="Nomor Induk Kependudukan" value="{{$sisya->nik_bapak}}">
                                        @if($errors->has('nik_bapak'))
                                        <span class="help-block">{{$errors->first('nik_bapak')}}</span>
                                        @endif
                                    </div>
                                    <div
                                        class=" form-group col-md-6 {{$errors->has('pekerjaan_bapak') ? ' has-error' : ''}}">
                                        <input name="pekerjaan_bapak" type="text" class="form-control"
                                            id="pekerjaan_bapak" placeholder="Pekerjaan"
                                            value="{{$sisya->pekerjaan_bapak}}">
                                        @if($errors->has('pekerjaan_bapak'))
                                        <span class="help-block">{{$errors->first('pekerjaan_bapak')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <label> Biodata Istri</label>
                                        <div class="form-group {{$errors->has('nama_ibu') ? ' has-error' : ''}}">
                                            <input name="nama_ibu" type="text" class="form-control" id="nama_ibu"
                                                placeholder="Nama Lengkap" value="{{$sisya->nama_ibu}}">
                                            @if($errors->has('nama_ibu'))
                                            <span class="help-block">{{$errors->first('nama_ibu')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6{{$errors->has('nik_ibu') ? ' has-error' : ''}}">
                                        <input name="nik_ibu" type="text" class="form-control" id="nik_ibu"
                                            placeholder="NIK" value="{{$sisya->nik_ibu}}">
                                        @if($errors->has('nik_ibu'))
                                        <span class="help-block">{{$errors->first('nik_ibu')}}</span>
                                        @endif
                                    </div>
                                    <div
                                        class="form-group col-md-6 {{$errors->has('pekerjaan_ibu') ? ' has-error' : ''}}">
                                        <input name="pekerjaan_ibu" type="text" class="form-control" id="pekerjaan_ibu"
                                            placeholder="Pekerjaan" value="{{$sisya->nik_bapak}}">
                                        @if($errors->has('pekerjaan_ibu'))
                                        <span class="help-block">{{$errors->first('pekerjaan_ibu')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-row {{$errors->has('alamat') ? ' has-error' : ''}}">
                                            <br>
                                            <label for="alamat">Alamat Tinggal</label>
                                            <input name="alamat" type="textara" class="form-control" id="inputAddress"
                                                placeholder="Alamat Tinggal" value="{{$sisya->alamat}}"> <br>
                                            @if($errors->has('alamat'))
                                            <span class="help-block">{{$errors->first('alamat')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 {{$errors->has('kabupaten') ? ' has-error' : ''}}">
                                        <label for="kabupaten">Kabupaten</label>
                                        <input name="kabupaten" type="text" class="form-control" id="kabupaten"
                                            placeholder="Kabupaten" value="{{$sisya->kabupaten}}">
                                        @if($errors->has('kabupaten'))
                                        <span class="help-block">{{$errors->first('kabupaten')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 {{$errors->has('provinsi') ? ' has-error' : ''}}">
                                        <label for="provinsi">Provinsi</label>
                                        <input name="provinsi" type="text" class="form-control" id="provinsi"
                                            placeholder="Provinsi" value="{{$sisya->provinsi}}">
                                        @if($errors->has('provinsi'))
                                        <span class="help-block">{{$errors->first('provinsi')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 {{$errors->has('tingkat') ? ' has-error' : ''}}">
                                        <label for="tingkat">Tingkat Kepinanditaan</label>
                                        <select name="tingkat" id="tingkat" class="form-control">
                                            <option selected disabled>Tingkat Kepinanditaan</option>
                                            <option value="Jro Mangku" @if($sisya->tingkat) == 'Jro Mangku') selected @endif>Jro Mangku</option>
                                            <option value="Jro Mangku Gede" @if($sisya->tingkat) == 'Jro Mangku Gede') selected @endif>Jro Mangku Gede</option>
                                            <option value="Ida Bhawati" @if($sisya->tingkat) == 'Ida Bhawati') selected @endif>Ida Bhawati</option>
                                        </select>
                                        @if($errors->has('tingkat'))
                                        <span class="help-block">{{$errors->first('tingkat')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 {{$errors->has('avatar') ? ' has-error' : ''}}">
                                        <label for="avatar">Avatar</label>
                                        <input name="avatar" type="file" class="form-control" id="inputAvatar"
                                            placeholder="Masukan foto sebagai tanda pengenal" value="{{$sisya->avatar}}">
                                        @if($errors->has('avatar'))
                                        <span class="help-block">{{$errors->first('avatar')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-6{{$errors->has('username') ? ' has-error' : ''}}">
                                        <br>
                                        <label for="username">Username</label>
                                        <input name="username" type="text" class="form-control" id="inputusername"
                                            placeholder="Masukan username agar dapat melakukan login"
                                            value="{{$sisya->user->username}}">
                                        @if($errors->has('username '))
                                        <span class="help-block">{{$errors->first('username')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 {{$errors->has('nohp_bapak') ? ' has-error' : ''}}">
                                        <br>
                                        <label for="nohp_bapak">Nomor Telpon</label>
                                        <input name="nohp_bapak" type="text" class="form-control" id="nohp_bapak"
                                            placeholder="Nomor yang bisa dihubungi" value="{{$sisya->nohp_bapak}}">
                                        @if($errors->has('nohp_bapak'))
                                        <span class="help-block">{{$errors->first('nohp_bapak')}}</span>
                                        @endif
                                    </div>
                                    @if(auth()->user()->role == 'admin')
                                        
                                    <div class="form-group col-md-6">
                                        <br>
                                        <label>Aktivasi Akun</label>
                                        <select name="status" id="status" class="form-control">
                                            <option selected disabled>Status Akun</option>
                                            <option value="0" @if($sisya->status == 0) selected @endif>Tidak Aktif</option>
                                            <option value="1" @if($sisya->status == 1) selected @endif>Aktif</option>
                                        </select>
                                        @if($errors->has('status'))
                                        <span class="help-block">{{$errors->first('status')}}</span>
                                        @endif
                                    </div>
                                    @endif
                                    <div class="col-md-12">
                                   
                                        <button type="submit" class="btn btn-warning">UPDATE</button>
                                   
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @stop